<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Director;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class DirectorRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Director
     */
    public function create(array $data): Director
    {
        $password = $data['password'];
        $dataStore = [
            'name'    => $data['name'],
            'email'         => $data['email'],
            'visiblePass' => $data['password'],
            'password'      => Hash::make($password),
            'status'     => 1,
        ];

        $director =  Director::create($dataStore);
        if(isset($data['photo'])){
            $DirectorArr['image'] = $this->uploadDoc($data, 'photo', $director->id);
            $director->update($DirectorArr);
        }
        //$director->notify(new RegisterdEmailNotification($password,$director));
        return $director;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Director $director [explicite description]
     *
     * @return Director
     * @throws Exception
     */
    public function update(array $data, Director $director): Director
    {
        $password = $data['password'];
        $dataUpdate = [
            'name'     => $data['name'],
            'visiblePass' => $data['password'],
            'email'    => $data['email']

        ];

        if( isset($password) )
        {
            $data['password'] = Hash::make($password);
        }

        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $director->id);
        }

        if( $director->update($dataUpdate) )
        {
            return $director;
        }

        throw new Exception('Director update failed.');
    }


    /**
     * Method delete
     *
     * @param User $user [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Director $director): bool
    {
        if( $director->forceDelete() )
        {
            return true;
        }

        throw new Exception('Director delete failed.');
    }


    public function forgotPassword(array $input)
    {
        $token = \Illuminate\Support\Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $input['email'],
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $user = Director::withTrashed()->where('email', $input['email'])->first();

        // Event for forgot password
        try
        {
            if($user->trashed())
            {
                $user->restore();
            }

            event(new ForgotPasswordEvent($user));
        } catch (Exception $e)
        {
            // Failed to dispatch event
            report($e);
        }
    }
    /**
     * Method changePassword
     *
     * @param Director $director
     * @param array $input
     *
     * @return void
     */
    public function changePassword(Director $director, array $input)
    {
        // if(!Hash::check($input['current_password'], $user->password))
        // {
        //     throw new GeneralException('Entered current password is incorrect.');
        // }

        $data = [
            'password'                 => Hash::make($input['new_password']),
            'is_first_time_login'      => 1,
        ];
        //$input['password'] = Hash::make($input['new_password']);
        //$input['is_first_time_login'] = 1;

        //unset($input['current_password']);
        //unset($input['new_password']);
        //unset($input['password_confirmation']);

        if($director->update($data))
        {
            return true;
        }

        throw new GeneralException('Change password failed.');
    }

    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Director $director): bool
    {
        $director->status = !$input['status'];
        return $director->save();
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
            $path = "upload/".$user_id.'/';
            return $path.FileUpload($data[$filename], 'upload/' . $user_id);
        } else {
            return "";
        }
    }


    public function getDirector(): Collection
    {
        return Director::all();
    }
}