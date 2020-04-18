<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('notification_flag');
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
        Schema::dropIfExists('line_notifications');
    }
}
