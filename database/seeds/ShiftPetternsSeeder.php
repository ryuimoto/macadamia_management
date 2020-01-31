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
            [
                'user_id' => 1,
                'name' => 'テスト1',
                // 'attendance' => new DateTime(),
                'attendance' => ('10:00'),
                'leaving' => ('18:00'),
            ],
            [
                'user_id' => 1,
                'name' => 'テスト2',
                'attendance' => ('10:00'),
                'leaving' => ('18:00'),
            ],
            [
                'user_id' => 1,
                'name' => 'テスト3',
                'attendance' => ('10:00'),
                'leaving' => ('18:00'),
            ],
            [
                'user_id' => 1,
                'name' => 'テスト3',
                'attendance' => ('10:00'),
                'leaving' => ('18:00'),
            ],
            [
                'user_id' => 1,
                'name' => 'テスト4',
                'attendance' => ('10:00'),
                'leaving' => ('18:00'),
            ],
        ]);
    }
}
