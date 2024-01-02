<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Add;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Add
     *
     */
    public function create(array $data): Add
    {

        $dataStore = [
            'title'    => $data['title'],
            'status'     => 1,
        ];

        $add =  Add::create($dataStore);
        if(isset($data['photo'])){
            $DirectorArr['image'] = $this->uploadDoc($data, 'photo', $add->id);
            $add->update($DirectorArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $add;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Add $add [explicite description]
     *
     * @return Add
     * @throws Exception
     */
    public function update(array $data, Add $add): Add
    {

        $dataUpdate = [
            'title'     => $data['title'],


        ];



        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $add->id);
        }

        if( $add->update($dataUpdate) )
        {
            return $add;
        }

        throw new Exception('add update failed.');
    }

    /**
     * Method delete
     *
     * @param Add $add [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Add $add): bool
    {
        if( $add->forceDelete() )
        {
            return true;
        }

        throw new Exception('Add delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Add $add): bool
    {
        $add->status = !$input['status'];
        return $add->save();
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
            $path = "add/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'add/' . $user_id);
        } else {
            return "";
        }
    }
    
}
