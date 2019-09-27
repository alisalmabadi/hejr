<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('form_type_id')->unsigned();
            $table->longText('description')->nullable();
            $table->unsignedInteger('form_status_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('forms', function (Blueprint $table) {
            $table->foreign('form_type_id')->references('id')->on('form_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_status_id')->references('id')->on('form_statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
