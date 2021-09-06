<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CommentTableSeeder extends Seeder
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
        'comment'   =>   '评论1',
        'article_id'   =>   rand(1, 3),
      ],
      [
        'comment'   =>   '评论2',
        'article_id'   =>   rand(1, 3),
      ],
      [
        'comment'   =>   '评论3',
        'article_id'   =>   rand(1, 3),
      ],
      [
        'comment'   =>   '评论4',
        'article_id'   =>   rand(1, 3),
      ],
      [
        'comment'   =>   '评论5',
        'article_id'   =>   rand(1, 3),
      ],
      [
        'comment'   =>   '评论6',
        'article_id'   =>   rand(1, 3),
      ],

    ];
    DB::table('comment')->insert($data);
  }
}
