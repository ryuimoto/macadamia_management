<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(ShiftPetternsSeeder::class);
        $this->call(StatusesTsableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(LineNotificationsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
    }
}
