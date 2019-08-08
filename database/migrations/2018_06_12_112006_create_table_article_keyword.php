<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticleKeyword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('article_keyword', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('article_keyword',function (Blueprint $table){

            $table->foreign('keyword_id')
                ->references('id')->on('keywords')
                ->onDelete('cascade');
            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_keyword');
    }
}
