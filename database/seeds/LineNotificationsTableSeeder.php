<?php

use Illuminate\Database\Seeder;

class LineNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('line_notifications')->insert([
            'user_id' => 1,
            'line_user_id' => 'U43acfcbc373087f4de9afd6573c91e9e',
            'contents' => 'これはテスト',
            'notification_flag' => true,
            'sending_period_day' => 1,
            'sending_period_time' => 01,
        ]);
    }
}
