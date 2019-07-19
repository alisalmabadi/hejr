<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('event_user_id')->unsigned();
            $table->integer('payment_method_id')->unsigned()->default(1);
            $table->integer('type');
            $table->string('amount');
            $table->string('authority');
            $table->string('refid')->nullable();
            $table->boolean('state')->defualt('0');
            $table->timestamps();
        });

        Schema::table('payments',function (Blueprint $table)
        {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_user_id')->references('id')->on('event_users')->onDelete('cascade');
           /* $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
