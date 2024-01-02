<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Language;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class LanguageRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Language
     */
    public function create(array $data): Language
    {

        $dataStore = [
            'language_name'    => $data['language_name'],
            'status'     => 1,
        ];

        $language =  Language::create($dataStore);
        if(isset($data['photo'])){
            $BannerArr['image'] = $this->uploadDoc($data, 'photo', $language->id);
            $language->update($BannerArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $language;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Language $language [explicite description]
     *
     * @return Language
     * @throws Exception
     */
    public function update(array $data, Language $language): Language
    {

        $dataUpdate = [
            'language_name'    => $data['language_name'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $language->id);
        }

        if( $language->update($dataUpdate) )
        {
            return $language;
        }

        throw new Exception('Language update failed.');
    }

    /**
     * Method delete
     *
     * @param Language $language [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Language $language): bool
    {
        if( $language->forceDelete() )
        {
            return true;
        }

        throw new Exception('Langauge delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Language $language): bool
    {
        $language->status = !$input['status'];
        return $language->save();
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
            $path = "language/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'language/' . $user_id);
        } else {
            return "";
        }
    }


    public function getLanguage(): Collection
    {
        return Language::all();
    }
}