<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Category;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Category
     */
    public function create(array $data): Category
    {

        $dataStore = [
            'category_name'    => $data['category_name'],
            'status'     => 1,
        ];

        $category =  Category::create($dataStore);
        if(isset($data['photo'])){
            $CategoryArr['image'] = $this->uploadDoc($data, 'photo', $category->id);
            $category->update($CategoryArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $category;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Category $category [explicite description]
     *
     * @return Category
     * @throws Exception
     */
    public function update(array $data, Category $category): Category
    {

        $dataUpdate = [
            'category_name'    => $data['category_name'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $category->id);
        }

        if( $category->update($dataUpdate) )
        {
            return $category;
        }

        throw new Exception('Category update failed.');
    }

    /**
     * Method delete
     *
     * @param Category $category [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Category $category): bool
    {
        if( $category->forceDelete() )
        {
            return true;
        }

        throw new Exception('Category delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Category $category): bool
    {
        $category->status = !$input['status'];
        return $category->save();
    }





   /**
     * Method uploadDoc
     *
     * @param $data $data [explicite description]
     * @param $filename $filename [explicite description]
     *
     * @return void
     */
    public function uploadDoc($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "category/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'category/' . $user_id);
        } else {
            return "";
        }

    }


    public function getCategory(): Collection
    {
        return Category::all();
    }

}