<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Users;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Users
     */
    public function create(array $data): Users
    {
        $password = $data['password'];
        $dataStore = [
            'name'    => $data['name'],
            'email'         => $data['email'],
            'password'      => Hash::make($password),
            'status'     => 1,
        ];

        $users =  Users::create($dataStore);
        if(isset($data['photo'])){
            $DirectorArr['image'] = $this->uploadDoc($data, 'photo', $users->id);
            $users->update($DirectorArr);
        }

        return $users;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Users  $users [explicite description]
     *
     * @return Users
     * @throws Exception
     */
    public function update(array $data, Users  $users): Users
    {
        $password = $data['password'];
        $dataUpdate = [
            'name'     => $data['name'],
            'email'    => $data['email']

        ];

        if( isset($password) )
        {
            $data['password'] = Hash::make($password);
        }

        if(isset($data['photo'])){
            $dataUpdate['image'] = $this->uploadDoc($data, 'photo', $director->id);
        }

        if( $users->update($dataUpdate) )
        {
            return $users;
        }

        throw new Exception('Users update failed.');
    }

    /**
     * Method delete
     *

     *
     * @return bool
     * @throws Exception
     */
    public function delete(Users $user): bool
    {

        if( $user->forceDelete() )
        {
            return true;
        }

        throw new Exception('users delete failed.');
    }





    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Users  $users): bool
    {
        $users->status = !$input['status'];
        return $users->save();
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
}