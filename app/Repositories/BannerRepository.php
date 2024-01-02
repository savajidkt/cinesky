<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Banner;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BannerRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Banner
     */
    public function create(array $data): Banner
    {

        $dataStore = [
            'name'    => $data['name'],
            'category'         => $data['category'],
            'status'     => 1,
        ];

        $banner =  Banner::create($dataStore);
        if(isset($data['photo'])){
            $BannerArr['image'] = $this->uploadDoc($data, 'photo', $banner->id);
            $banner->update($BannerArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $banner;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Banner $banner [explicite description]
     *
     * @return Banner
     * @throws Exception
     */
    public function update(array $data, Banner $banner): Banner
    {

        $dataUpdate = [
            'name'    => $data['name'],
            'category'         => $data['category'],

        ];


        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $banner->id);
        }

        if( $banner->update($dataUpdate) )
        {
            return $banner;
        }

        throw new Exception('Banner update failed.');
    }

    /**
     * Method delete
     *
     * @param Banner $banner [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Banner $banner): bool
    {
        if( $banner->forceDelete() )
        {
            return true;
        }

        throw new Exception('Banner delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Banner $banner): bool
    {
        $banner->status = !$input['status'];
        return $banner->save();
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
            $path = "banner/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'banner/' . $user_id);
        } else {
            return "";
        }
    }
}
