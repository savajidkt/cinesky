<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Homecategory;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class HomecategoryRepository
{

    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Homecategory
     *
     */
    public function create(array $data): Homecategory
    {

        $dataStore = [
            'home_title'    => $data['home_title'],
            'cat_type'    => $data['cat_type'],
            'status'     => 1,
        ];

        $homecategory =  Homecategory::create($dataStore);
        if(isset($data['photo'])){
            $HomecategoryArr['image'] = $this->uploadDoc($data, 'photo', $homecategory->id);
            $homecategory->update($HomecategoryArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $homecategory;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Homecategory $homecategory [explicite description]
     *
     * @return Homecategory
     * @throws Exception
     */
    public function update(array $data, Homecategory $homecategory): Homecategory
    {

        $dataUpdate = [
            'home_title'    => $data['home_title'],
            'cat_type'    => $data['cat_type'],
        ];



        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $homecategory->id);
        }

        if( $homecategory->update($dataUpdate) )
        {
            return $homecategory;
        }

        throw new Exception('Homecategory update failed.');
    }

    /**
     * Method delete
     *
     * @param Homecategory $homecategory [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Homecategory $homecategory): bool
    {
        if( $homecategory->forceDelete() )
        {
            return true;
        }

        throw new Exception('Homecategory delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Homecategory $homecategory): bool
    {
        $homecategory->status = !$input['status'];
        return $homecategory->save();
    }

    public function getHomecategory(): Collection
    {
        return Homecategory::all();
    }
}