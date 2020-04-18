<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('notification_flag');
            $table->string('email');
            $table->integer('day_of_the_day');
            $table->time('day_of_the_time');
            $table->text('contents');
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
        Schema::dropIfExists('mail_notifications');
    }
}
