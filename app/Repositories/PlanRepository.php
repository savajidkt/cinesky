<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Plan;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PlanRepository
{

    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Plan
     *
     */
    public function create(array $data): Plan
    {

        $dataStore = [
            'nameplan'    => $data['nameplan'],
            'validity'    => $data['validity'],
            'description'    => $data['description'],
            'price'    => $data['price'],
            'discount_price'    => $data['discount_price'],
            'status'     => 1,
        ];

        $plan =  Plan::create($dataStore);
        if(isset($data['photo'])){
            $DirectorArr['image'] = $this->uploadDoc($data, 'photo', $plan->id);
            $plan->update($DirectorArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $plan;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Plan $plan [explicite description]
     *
     * @return Plan
     * @throws Exception
     */
    public function update(array $data, Plan $plan): Plan
    {

        $dataUpdate = [
            'nameplan'    => $data['nameplan'],
            'validity'    => $data['validity'],
            'description'    => $data['description'],
            'price'    => $data['price'],
            'discount_price'    => $data['discount_price'],


        ];



        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $plan->id);
        }

        if( $plan->update($dataUpdate) )
        {
            return $plan;
        }

        throw new Exception('plan update failed.');
    }

    /**
     * Method delete
     *
     * @param Plan $plan [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Plan $plan): bool
    {
        if( $plan->forceDelete() )
        {
            return true;
        }

        throw new Exception('Plan delete failed.');
    }



    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Plan $plan): bool
    {
        $plan->status = !$input['status'];
        return $plan->save();
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
            return FileUpload($data[$filename], 'add/' . $user_id);
        } else {
            return "";
        }
    }
}
