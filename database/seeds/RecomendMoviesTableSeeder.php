<?php

use Illuminate\Database\Seeder;

class RecomendMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recomend_movies')->insert([
            'movie_id' => 'f_nyZGcLwhU',
            'title' => 'Bootstrap4の使い方 | グリッドレイアウトについて',
            'category_id' => 6,
            'thumb_url' => '/default.jpg',
            'post_date' => '2018-08-01',
        ]);
    }
}
