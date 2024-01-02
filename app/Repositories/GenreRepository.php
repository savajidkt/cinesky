<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Genre;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class GenreRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Genre
     */
    public function create(array $data): Genre
    {

        $dataStore = [
            'genre_name'    => $data['genre_name'],
            'status'     => 1,
        ];

        $genre =  Genre::create($dataStore);
        if(isset($data['photo'])){
            $GenreArr['image'] = $this->uploadDoc($data, 'photo', $genre->id);
            $genre->update($GenreArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $genre;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Genre $genre [explicite description]
     *
     * @return Genre
     * @throws Exception
     */
    public function update(array $data, Genre $genre): Genre
    {

        $dataUpdate = [
            'genre_name'    => $data['genre_name'],
        ];


        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $genre->id);
        }

        if( $genre->update($dataUpdate) )
        {
            return $genre;
        }

        throw new Exception('Genre update failed.');
    }

    /**
     * Method delete
     *
     * @param Genre $genre [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Genre $genre): bool
    {
        if( $genre->forceDelete() )
        {
            return true;
        }

        throw new Exception('Genre delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Genre $genre): bool
    {
        $genre->status = !$input['status'];
        return $genre->save();
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
            $path = "genre/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'genre/' . $user_id);
        } else {
            return "";
        }
    }


    public function getGenre(): Collection
    {
        return Genre::all();
    }

}