<?php

use Illuminate\Database\Seeder;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Shift::class,50)->create();

        DB::table('shifts')->insert([
            [
                'user_id' => 1,
                'attendance' => '10:00:00',
                'leaving' => '18:00:00',
                'date' => 2020-04-11,
            ],
        ]);
    }
}
