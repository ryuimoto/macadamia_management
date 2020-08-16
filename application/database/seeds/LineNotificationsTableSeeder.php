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
            [
                'notification_flag' => true,
                'day_of_the_day' => 25,
                'day_of_the_time' => '12:00:00',
                'contents' => 'シーダーからのデータです',
            ],
        ]);
    }
}
