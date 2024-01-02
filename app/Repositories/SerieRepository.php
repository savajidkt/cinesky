<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Serie;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class SerieRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Serie
     */
    public function create(array $data): Serie
    {

        $dataStore = [
            'series_name'    => $data['series_name'],
            'series_desc'         => $data['series_desc'],
            'status'     => 1,
        ];


        $serie =  Serie::create($dataStore);

        if(isset($data['photo'])){
            $SerieposterArr['series_poster'] = $this->uploadPoster($data, 'photo', $serie->id);

            $serie->update($SerieposterArr);


        }

        if(isset($data['img'])){
            $SeriecoverArr['series_cover'] = $this->uploadCover($data, 'img', $serie->id);
            $serie->update($SeriecoverArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $serie;
    }


    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Serie $serie [explicite description]
     *
     * @return Serie
     * @throws Exception
     */
    public function update(array $data, Serie $serie): Serie
    {
        $dataUpdate = [
            'series_name'    => $data['series_name'],
            'series_desc'         => $data['series_desc'],
        ];



        if(isset($data['photo'])){
            $dataUpdate['series_poster'] = $this->uploadPoster($data, 'photo', $serie->id);
        }

        if(isset($data['img'])){
            $dataUpdate['series_cover'] = $this->uploadCover($data, 'img', $serie->id);
        }

        if( $serie->update($dataUpdate) )
        {
            return $serie;
        }

        throw new Exception('Series update failed.');
    }

    /**
     * Method delete
     *
     * @param Serie $serie [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Serie $serie): bool
    {
        if( $serie->forceDelete() )
        {
            return true;
        }

        throw new Exception('Serie delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Serie $serie): bool
    {
        $serie->status = !$input['status'];
        return $serie->save();
    }

   /**
     * Method uploadDoc
     *
     * @param $data $data [explicite description]
     * @param $filename $filename [explicite description]
     *
     * @return void
     */

    public function uploadCover($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "seriescover/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'seriescover/' . $user_id);
        } else {
            return "";
        }
    }


    public function uploadPoster($data, $filename, $user_id)
    {
        if (strlen($data[$filename]) > 0) {
            FolderExists($user_id);
            $path = "seriesposter/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'seriesposter/' . $user_id);
        } else {
            return "";
        }
    }




    /**
     * Method getSerie
     *
     * @return Collection
     */
    public function getSerie(): Collection
    {
        return Serie::all();
    }



}
