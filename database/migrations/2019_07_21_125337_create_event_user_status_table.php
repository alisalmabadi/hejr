<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventUserStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user_statuses', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id');
            $table->string('sms_text')->defualt(0);
            $table->boolean('send_sms')->nullable();;
            $table->string('class')->nullable();
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
        Schema::dropIfExists('event_user_statuses');
    }
}
