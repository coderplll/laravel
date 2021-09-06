<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ArticleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'article_name'   =>   '诗经1',
        'author_id'   =>   1,
      ],
      [
        'article_name'   =>   '诗经2',
        'author_id'   =>   2,
      ],
      [
        'article_name'   =>   '诗经3',
        'author_id'   =>   3,
      ],

    ];
    DB::table('article')->insert($data);
  }
}
