<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecomendMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomend_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movie_id');
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('thumb_url'); //要確認　データ型
            $table->date('post_date');  //動画の投稿日
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('search_words')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recomend_movies');
    }
}
