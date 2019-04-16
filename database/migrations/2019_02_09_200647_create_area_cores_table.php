<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaCoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_cores', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->integer('core_id')->unsigned();
        });
        Schema::table('area_cores', function (Blueprint $table) {
        $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('core_id')->references('id')->on('cores')->onDelete('cascade');

        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_cores');
    }
}
