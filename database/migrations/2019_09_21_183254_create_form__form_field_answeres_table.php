<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFormFieldAnsweresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_form_field_answeres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_formfield_id')->unsigned();
            $table->longText('answere');
            $table->unsignedInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('form_form_field_answeres', function (Blueprint $table) {
            $table->foreign('form_formfield_id')->references('id')->on('form_form_fields')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_form_field_answeres');
    }
}
