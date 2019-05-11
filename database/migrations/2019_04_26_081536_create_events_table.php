<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('long_description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->datetime('end_date_signup');;
            $table->bigInteger('price');
            $table->integer('capacity');
            $table->integer('event_subject_id')->unsigned();
            $table->integer('event_type_id')->unsigned();
            $table->integer('event_status_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('address');
            $table->string('address_point')->nullable();
            $table->integer('operator_user_id')->unsigned();
            $table->integer('center_core_id')->unsigned();
            $table->json('information');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('event_subject_id')->references('id')->on('event_subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_status_id')->references('id')->on('event_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operator_user_id')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('center_core_id')->references('id')->on('cores')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
