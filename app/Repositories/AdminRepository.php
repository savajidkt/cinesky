<?php

namespace App\Repositories;

use App\Events\ForgotPasswordEvent;
use App\Exceptions\GeneralException;
use App\Models\Admin;
use App\Notifications\RegisterdEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Admin
     */
    public function create(array $data): Admin
    {
        $password = $data['password'];
        $data = [
            'name'    => $data['fullname'],
            'email'     => $data['email'],
            'type'     => $data['type'],
            'visiblePass'=> $data['password'],
            'password'      => Hash::make($password),
        ];

        $admin =  Admin::create($data);
        //$admin->notify(new RegisterdEmailNotification($password,$admin));
        return $admin;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Admin $admin [explicite description]
     *
     * @return Admin
     * @throws Exception
     */
    public function update(array $data, Admin $admin): Admin
    {
        $password = $data['password'];
        $data = [
            'name'       => $data['fullname'],
            'email'         => $data['email'],
            'visiblePass' => $data['password'],
            'type'         => $data['type']
            
        ];
        
        if( isset($password) )
        {
            
            $data['password'] = Hash::make($password);
           
        }

        if( $admin->update($data) )
        {
            return $admin;
        }

        throw new Exception('Admin update failed.');
    }

    /**
     * Method delete
     *
     * @param Admin $user [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Admin $admin): bool
    {
        if( $admin->forceDelete() )
        {
            return true;
        }

        throw new Exception('Admin delete failed.');
    }


    public function forgotPassword(array $input)
    {
        $token = \Illuminate\Support\Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $input['email'],
            'created_at' => Carbon::now()
        ]);
        $admin = Admin::withTrashed()->where('email', $input['email'])->first();

        // Event for forgot password
        try
        {
            if($admin->trashed())
            {
                $admin->restore();
            }

            event(new ForgotPasswordEvent($admin));
        } catch (Exception $e)
        {
            // Failed to dispatch event
            report($e);
        }
    }
    /**
     * Method changePassword
     *
     * @param Admin $adin
     * @param array $input
     *
     * @return void
     */
    public function changePassword(Admin $admin, array $input)
    {
        // if(!Hash::check($input['current_password'], $user->password))
        // {
        //     throw new GeneralException('Entered current password is incorrect.');
        // }

        $data = [
            'password'                 => Hash::make($input['new_password'])
        ];
        //$input['password'] = Hash::make($input['new_password']);
        //$input['is_first_time_login'] = 1;

        //unset($input['current_password']);
        //unset($input['new_password']);
        //unset($input['password_confirmation']);

        if($admin->update($data))
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
    public function changeStatus(array $input, Admin $admin): bool
    {
        $admin->status = !$input['status'];
        return $admin->save();
    }

   
}