<?php

use Illuminate\Database\Seeder;

class ShiftPetternsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_petterns')->insert([
            'user_id' => 1,
            'attendance' => new DateTime(),
            'leaving' => new DateTime(),
        ]);
    }
}
