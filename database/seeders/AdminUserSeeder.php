<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name'=>'Savji',
            'last_name'=>'Rathod',
            'address'=>'Dummy Address',
            'email'=>'savaji.dkt@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'=>Hash::make('123456'),
            'user_type'=>2,
            'user_status'=>1,
            'is_first_time_login'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
