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
        DB::table('shifts')->insert([
            [
                'user_id' => 1,
                // 'status_id' => 1,
                'attendance' => '13:00:00',
                'leaving' => '18:00:00',
                'date' => 2020-02-06,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
