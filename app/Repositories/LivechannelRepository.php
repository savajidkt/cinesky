<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Livechannel;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class LivechannelRepository
{

    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Livechannel
     */
    public function create(array $data): Livechannel
    {

        $dataStore = [
            'channel_title'    => $data['channel_title'],
            'cat_id'    => $data['cat_id'],
            'channel_type'    => $data['channel_type'],
            'channel_url'    => $data['channel_url'],
            'channel_desc'    => $data['channel_desc'],
            'status'     => 1,
        ];

        $livechannel =  Livechannel::create($dataStore);
        if(isset($data['photo'])){
            $SerieposterArr['channel_poster'] = $this->uploadPoster($data, 'photo', $livechannel->id);

            $livechannel->update($SerieposterArr);


        }

        if(isset($data['img'])){
            $SeriecoverArr['channel_cover'] = $this->uploadCover($data, 'img', $livechannel->id);
            $livechannel->update($SeriecoverArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $livechannel;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Livechannel $livechannel [explicite description]
     *
     * @return Livechannel
     * @throws Exception
     */
    public function update(array $data, Livechannel $livechannel): Livechannel
    {

        $dataUpdate = [
            'channel_title'    => $data['channel_title'],
            'cat_id'    => $data['cat_id'],
            'channel_type'    => $data['channel_type'],
            'channel_url'    => $data['channel_url'],
            'channel_poster'    => $data['channel_poster'],
            'channel_cover'    => $data['channel_cover'],
            'channel_desc'    => $data['channel_desc'],
        ];




        if( $livechannel->update($dataUpdate) )
        {
            return $livechannel;
        }

        throw new Exception('Live Channel update failed.');
    }

    /**
     * Method delete
     *
     * @param Livechannel $livechannel [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Livechannel $livechannel): bool
    {
        if( $livechannel->forceDelete() )
        {
            return true;
        }

        throw new Exception('Live Channel delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Livechannel $livechannel): bool
    {
        $livechannel->status = !$input['status'];
        return $livechannel->save();
    }


    public function uploadCover($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "livechannelcover/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'livechannelcover/' . $user_id);
        } else {
            return "";
        }
    }


    public function uploadPoster($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "livechannelposter/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'livechannelposter/' . $user_id);
        } else {
            return "";
        }
    }


}
