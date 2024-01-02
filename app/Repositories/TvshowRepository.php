<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Tvshow;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class TvshowRepository
{

    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Tvshow
     */
    public function create(array $data): Tvshow
    {

        $dataStore = [
            'title'    => $data['title'],
            'channel_id'    => $data['channel_id'],
            'description'    => $data['description'],
            'status'     => 1,
        ];

        $tvshow =  Tvshow::create($dataStore);
        if(isset($data['photo'])){
            $TvshowArr['image'] = $this->uploadDoc($data, 'photo', $tvshow->id);
            $tvshow->update($TvshowArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $tvshow;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Tvshow $tvshow [explicite description]
     *
     * @return Tvshow
     * @throws Exception
     */
    public function update(array $data, Tvshow $tvshow): Tvshow
    {

        $dataUpdate = [
            'title'    => $data['title'],
            'channel_id'    => $data['channel_id'],
            'description'    => $data['description'],
        ];

        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $tvshow->id);
        }



        if( $tvshow->update($dataUpdate) )
        {
            return $tvshow;
        }

        throw new Exception('Season update failed.');
    }

    /**
     * Method delete
     *
     * @param Tvshow $tvshow [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Tvshow $tvshow): bool
    {
        if( $tvshow->forceDelete() )
        {
            return true;
        }

        throw new Exception('Tvshow delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Tvshow $tvshow): bool
    {
        $tvshow->status = !$input['status'];
        return $tvshow->save();
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
            $path = "tvshow/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'tvshow/' . $user_id);
        } else {
            return "";
        }
    }



    /**
     * Method getTvshow
     *
     * @return Collection
     */
    public function getTvshow(): Collection
    {
        return Tvshow::all();
    }


}
