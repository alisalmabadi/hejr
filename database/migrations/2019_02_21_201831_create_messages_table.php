<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('text');
            $table->integer('status')->default(1);
            $table->integer('is_admin')->default(1);
            $table->unsignedInteger('fuser_id')->nullable();
            $table->unsignedInteger('message_type_id')->default(1);
            $table->timestamps();
        });
        Schema::table('messages',function(Blueprint $table){
            $table->foreign('message_type_id')->references('id')->on('message_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
