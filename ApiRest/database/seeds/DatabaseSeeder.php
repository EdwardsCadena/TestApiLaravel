<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Additional;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();
        factory(Additional::class, 50)->create();
    }
}
