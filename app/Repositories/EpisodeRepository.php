<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Episode;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EpisodeRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Episode
     */
    public function create(array $data): Episode
    {
        $dataStore = [
            'series_id'    => $data['series_id'],
            'season_id'         => $data['season_id'],
            'episode_title'         => $data['episode_title'],
            'episode_type'         => $data['episode_type'],
            'episode_url'         => isset($data['url']) ? $data['url'] : null,
            'episode_description'         => $data['episode_description'],
            'status'     => 1,
        ];
        $episode =  Episode::create($dataStore);


        if(isset($data['video'])){
            $VideoArr['episode_url'] = $this->uploadVideo($data, 'video', $episode->id);
            $episode->update($VideoArr);
        }

        if(isset($data['photo'])){
            $PosterArr['poster_image'] = $this->uploadposterDoc($data, 'photo', $episode->id);
            $episode->update($PosterArr);
        }


        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $episode;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Episode $episode [explicite description]
     *
     * @return Episode
     * @throws Exception
     */
    public function update(array $data, Episode $episode): Episode
    {
        $dataUpdate = [
            'series_id'    => $data['series_id'],
            'season_id'         => $data['season_id'],
            'episode_title'         => $data['episode_title'],
            'episode_type'         => $data['episode_type'],
            'episode_url'         => isset($data['url']) ? $data['url'] : null,
            'episode_description'         => $data['episode_description'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['poster_image'] = $this->uploadposterDoc($data, 'photo', $episode->id);
        }


        if(isset($data['video'])){
            $dataUpdate['movie_url'] = $this->uploadVideo($data, 'video', $episode->id);
        }


        if( $episode->update($dataUpdate) )
        {
            return $episode;
        }

        throw new Exception('Episode update failed.');
    }


    /**
     * Method delete
     *
     * @param Episode $episode [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Episode $episode): bool
    {
        if( $episode->forceDelete() )
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
    public function changeStatus(array $input, Episode $episode): bool
    {
        $episode->status = !$input['status'];
        return $episode->save();
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
            $path = "episodeposter/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'episodeposter/' . $user_id);
        } else {
            return "";
        }
    }



    public function uploadVideo($data, $filename, $user_id)
{
    if (strlen($data[$filename]) > 0) {
        VedioFolderExists($user_id);
        $path = "videoepisode/".$user_id.'/';
        return $path . MovieFileUpload($data[$filename], 'videoepisode/' . $user_id);
    } else {
        return "";
    }
}


}
