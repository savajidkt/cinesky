<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Tvepisode;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TvepisodeRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Tvepisode
     */
    public function create(array $data): Tvepisode
    {
        $dataStore = [
            'tvshow_id'    => $data['tvshow_id'],
            'episode_title'         => $data['episode_title'],
            'episode_type'         => $data['episode_type'],
            'episode_url'         => isset($data['url']) ? $data['url'] : null,
            'episode_description'         => $data['episode_description'],
            'status'     => 1,
        ];
        $tvepisode =  Tvepisode::create($dataStore);


        if(isset($data['video'])){
            $VideoArr['episode_url'] = $this->uploadVideo($data, 'video', $tvepisode->id);
            $tvepisode->update($VideoArr);
        }

        if(isset($data['photo'])){
            $PosterArr['poster_image'] = $this->uploadposterDoc($data, 'photo', $tvepisode->id);
            $tvepisode->update($PosterArr);
        }


        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $tvepisode;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Tvepisode $tvepisode [explicite description]
     *
     * @return Tvepisode
     * @throws Exception
     */
    public function update(array $data, Tvepisode $tvepisode): Tvepisode
    {
        $dataUpdate = [
            'tvshow_id'    => $data['tvshow_id'],
            'episode_title'         => $data['episode_title'],
            'episode_type'         => $data['episode_type'],
            'episode_url'         => isset($data['url']) ? $data['url'] : null,
            'episode_description'         => $data['episode_description'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['poster_image'] = $this->uploadposterDoc($data, 'photo', $tvepisode->id);
        }


        if(isset($data['video'])){
            $dataUpdate['movie_url'] = $this->uploadVideo($data, 'video', $tvepisode->id);
        }


        if( $tvepisode->update($dataUpdate) )
        {
            return $tvepisode;
        }

        throw new Exception('Episode update failed.');
    }


    /**
     * Method delete
     *
     * @param Tvepisode $tvepisode [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Tvepisode $tvepisode): bool
    {
        if( $tvepisode->forceDelete() )
        {
            return true;
        }

        throw new Exception('Episode delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Tvepisode $tvepisode): bool
    {
        $tvepisode->status = !$input['status'];
        return $tvepisode->save();
    }

   /**
     * Method uploadDoc
     *
     * @param $data $data [explicite description]
     * @param $filename $filename [explicite description]
     *
     * @return void
     */
    public function uploadposterDoc($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "tvepisodeposter/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'tvepisodeposter/' . $user_id);
        } else {
            return "";
        }
    }



    public function uploadVideo($data, $filename, $user_id)
{
    if (strlen($data[$filename]) > 0) {
        VedioFolderExists($user_id);
        $path = "tvvideoepisode/".$user_id.'/';
        return $path . MovieFileUpload($data[$filename], 'tvvideoepisode/' . $user_id);
    } else {
        return "";
    }
}


}
