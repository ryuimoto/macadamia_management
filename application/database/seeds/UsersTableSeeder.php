<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ユーザー太郎',
                'status_id' => 1,
                'image_name' => 12355,
                'email' => 'test12345@gmail.com',
                'line_notification' => true,
                'mail_notification' => true,
                'password' => bcrypt('test12345'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'ユーザー次郎',
                'status_id' => 1,
                'image_name' => 35456766876,
                'email' => 'jirou12345@gmail.com',
                'line_notification' => true,
                'mail_notification' => true,
                'password' => bcrypt('test12345'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           
        ]);
    }
}
