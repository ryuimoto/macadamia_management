<?php

use Illuminate\Database\Seeder;

class SuperVisorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('super_visors')->insert([
            [
                'name' => 'スーパーバイザー太郎',
                'email' => 'test12345@gmail.com',
                'line_notification' => true,
                'mail_notification' => true,
                'line_displayname' => 'テストスーパーバイザー',
                'line_user_id' => 'U43acfcbc373087f4de9afd6573c91e9e',
            ],
        ]);
    }
}
