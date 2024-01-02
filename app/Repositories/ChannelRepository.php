<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Channel;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class ChannelRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Channel
     */
    public function create(array $data): Channel
    {

        $dataStore = [
            'name'    => $data['name'],
            'status'     => 1,
        ];

        $channel =  Channel::create($dataStore);
        if(isset($data['photo'])){
            $ChannelArr['image'] = $this->uploadDoc($data, 'photo', $channel->id);
            $channel->update($ChannelArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $channel;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Channel $channel [explicite description]
     *
     * @return Channel
     * @throws Exception
     */
    public function update(array $data, Channel $channel): Channel
    {

        $dataUpdate = [
            'name'    => $data['name'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $channel->id);
        }

        if( $channel->update($dataUpdate) )
        {
            return $channel;
        }

        throw new Exception('Channel update failed.');
    }

    /**
     * Method delete
     *
     * @param Channel $channel [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Channel $channel): bool
    {
        if( $channel->forceDelete() )
        {
            return true;
        }

        throw new Exception('Channel delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Channel $channel): bool
    {
        $channel->status = !$input['status'];
        return $channel->save();
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
            $path = "channel/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'channel/' . $user_id);
        } else {
            return "";
        }
    }


    public function getChannel(): Collection
    {
        return Channel::all();
    }
}