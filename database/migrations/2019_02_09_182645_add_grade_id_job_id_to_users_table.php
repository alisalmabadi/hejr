<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGradeIdJobIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->nullable()->after('name');
            $table->string('father_name')->nullable()->after('martial');
            $table->timestamp('birthday')->nullable()->after('father_name');
            $table->integer('grade_id')->unsigned()->nullable()->after('birthday');
            $table->integer('job_id')->unsigned()->nullable()->after('grade_id');

        });
        Schema::table('users',function (Blueprint $table){
           $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
           $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
