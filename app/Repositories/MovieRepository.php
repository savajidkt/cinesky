<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Movie;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MovieRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Movie
     */
    public function create(array $data): Movie
    {
        $dataStore = [
            'language_id'    => $data['language_id'],
            'genre_id'         => $data['genre_id'],
            'home_cat_id'         => $data['home_cat_id'],
            'director_id'         => $data['director_id'],
            'movie_title'         => $data['movie_title'],
            'movie_subtitle'         => $data['movie_subtitle'],
            'movie_type'         => $data['movie_type'],
            'release_date'         => $data['release_date'],
            'vedio_type'         => $data['vedio_type'],
            'movie_description'         => $data['movie_description'],
            'movie_url'         => isset($data['url']) ? $data['url'] : null,
            'status'     => 1,
        ];
        $dataStore['movie_price'] = ($data['movie_type'] === 'paid' && isset($data['movie_price'])) ? $data['movie_price'] : 0;
        $movie =  Movie::create($dataStore);
        
        
        if(isset($data['video'])){
            $VideoArr['movie_url'] = $this->uploadVideo($data, 'video', $movie->id);
            $movie->update($VideoArr);
        }

        if(isset($data['photo'])){
            $PosterArr['poster_image'] = $this->uploadposterDoc($data, 'photo', $movie->id);
            $movie->update($PosterArr);
        }

        if(isset($data['img'])){
            $PosterArr['cover_image'] = $this->uploadcoverDoc($data, 'photo', $movie->id);
            $movie->update($PosterArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $movie;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Movie $movie [explicite description]
     *
     * @return Movie
     * @throws Exception
     */
    public function update(array $data, Movie $movie): Movie
    {
        $dataUpdate = [
            'language_id'    => $data['language_id'],
            'genre_id'         => $data['genre_id'],
            'home_cat_id'         => $data['home_cat_id'],
            'director_id'         => $data['director_id'],
            'movie_title'         => $data['movie_title'],
            'movie_subtitle'         => $data['movie_subtitle'],
            'movie_type'         => $data['movie_type'],
            'release_date'         => $data['release_date'],
            'vedio_type'         => $data['vedio_type'],
            'movie_description'         => $data['movie_description'],
            'movie_url'         => isset($data['url']) ? $data['url'] : null,
        ];

        $dataUpdate['movie_price'] = ($data['movie_type'] === 'paid' && isset($data['movie_price'])) ? $data['movie_price'] : 0;

        if(isset($data['photo'])){
            $dataUpdate['poster_image'] = $this->uploadposterDoc($data, 'photo', $movie->id);
        }


        if(isset($data['img'])){
            $dataUpdate['cover_image'] = $this->uploadcoverDoc($data, 'img', $movie->id);
        }


        
        if(isset($data['video'])){
            $dataUpdate['movie_url'] = $this->uploadVideo($data, 'video', $movie->id);
        }

        if( $movie->update($dataUpdate) )
        {
            return $movie;
        }

        throw new Exception('Movie update failed.');
    }


    /**
     * Method delete
     *
     * @param Movie $movie [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Movie $movie): bool
    {
        if( $movie->forceDelete() )
        {
            return true;
        }

        throw new Exception('Movie delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Movie $movie): bool
    {
        $movie->status = !$input['status'];
        return $movie->save();
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
            $path = "movieposter/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'movieposter/' . $user_id);
        } else {
            return "";
        }
    }


    public function uploadcoverDoc($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "moviecover/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'moviecover/' . $user_id);
        } else {
            return "";
        }
    }



    public function uploadVideo($data, $filename, $user_id)
{
    if (strlen($data[$filename]) > 0) {
        VedioFolderExists($user_id);
        $path = "videomovie/".$user_id.'/';
        return $path . MovieFileUpload($data[$filename], 'videomovie/' . $user_id);
    } else {
        return "";
    }
}


}