<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(AdminUserSeeder::class);
        //$this->call(AdminLoginSeeder::class);
        //$this->call(QuestionSeeder::class);
        $this->call(QuestionOptionsSeeder::class);
    }
}
