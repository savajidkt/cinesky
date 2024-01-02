<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Setting;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingRepository
{


    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Setting $setting [explicite description]
     *
     * @return Setting
     * @throws Exception
     */
    public function update(array $data, Setting $setting): Setting
    {

        $dataUpdate = [
            'app_name'     => $data['app_name'],
            'upi'     => $data['upi'],
            'app_email'     => $data['app_email'],
            'app_version'     => $data['app_version'],
            'app_contact'     => $data['app_contact'],
            'app_description'     => $data['app_description'],
            'app_developed_by'     => $data['app_developed_by'],
            'app_privacy_policy'     => $data['app_privacy_policy'],
            'app_terms_condition'     => $data['app_terms_condition'],
            'app_refund_policy'     => $data['app_refund_policy'],

        ];



        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $setting->id);
        }

        if( $setting->update($dataUpdate) )
        {
            return $setting;
        }

        throw new Exception('Setting update failed.');
    }

    /**
     * Method delete
     *
     * @param Setting $setting [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Setting $setting): bool
    {
        if( $setting->forceDelete() )
        {
            return true;
        }

        throw new Exception('Add delete failed.');
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
            return FileUpload($data[$filename], 'upload/' . $user_id);
        } else {
            return "";
        }
    }
}
