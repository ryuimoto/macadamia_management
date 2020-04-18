<?php

use Illuminate\Database\Seeder;

class MailNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_notifications')->insert([
            [
                'notification_flag' => true,
                'email' => 'test12345@gmail.com',
                'day_of_the_day' => 25,
                'day_of_the_time' => '12:00:00',
                'contents' => 'シーダーからのデータです',
            ],
        ]);
    }
}
