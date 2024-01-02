<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Season;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
class SeasonRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Season
     */
    public function create(array $data): Season
    {

        $dataStore = [
            'season_name'    => $data['season_name'],
            'series_id'    => $data['series_id'],
            'status'     => 1,
        ];

        $season =  Season::create($dataStore);

        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $season;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Season $season [explicite description]
     *
     * @return Season
     * @throws Exception
     */
    public function update(array $data, Season $season): Season
    {

        $dataUpdate = [
            'season_name'    => $data['season_name'],
            'series_id'    => $data['series_id'],
        ];




        if( $season->update($dataUpdate) )
        {
            return $season;
        }

        throw new Exception('Season update failed.');
    }

    /**
     * Method delete
     *
     * @param Season $season [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Season $season): bool
    {
        if( $season->forceDelete() )
        {
            return true;
        }

        throw new Exception('Season delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Season $season): bool
    {
        $season->status = !$input['status'];
        return $season->save();
    }


    public function getSeason(): Collection
    {
        return Season::all();
    }


}