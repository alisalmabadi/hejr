<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('form_id')->unsinged();
            $table->unsignedInteger('form_field_id')->unsigned();
            $table->longText('attribute')->nullable();
            $table->integer('status');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::table('form_form_fields', function (Blueprint $table) {
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_field_id')->references('id')->on('form_fields')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_form_fields');
    }
}
