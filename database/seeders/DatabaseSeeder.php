<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(6)->create()->each(function ($user){
            for ($i = 0; $i < 6; $i++){
                $user->comments()->save(\App\Models\Comment::factory()->make());
            }
        });
    }
}
