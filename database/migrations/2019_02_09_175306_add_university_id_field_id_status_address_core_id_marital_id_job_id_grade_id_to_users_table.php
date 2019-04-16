<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniversityIdFieldIdStatusAddressCoreIdMaritalIdJobIdGradeIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('university_id')->unsinged()->nullable()->before('password');
            $table->integer('field_id')->unsinged()->nullable()->before('password');
            $table->integer('status')->default(1)->before('password');
            $table->text('address')->nullable()->before('password');
            $table->integer('core_id')->unsinged()->nullable()->before('password');
            $table->integer('martial')->nullable()->before('password');
            $table->string('birthday')->nullable()->before('marial');

        });

        Schema::table('users',function (Blueprint $table){
           $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('core_id')->references('id')->on('cores')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
