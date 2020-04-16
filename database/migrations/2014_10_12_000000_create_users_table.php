<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('status_id');
            $table->string('image_name');
            $table->string('email')->unique();
            $table->boolean('line_notification');
            $table->boolean('mail_notification');
            $table->string('line_displayname')->nullable()->unique();
            $table->string('line_user_id')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable()->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
