<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KeywordAndRelationTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data1 = [
      [
        'keyword'   =>   '科幻',
      ],
      [
        'keyword'   =>   '冯小刚',
      ],
      [
        'keyword'   =>   '悬疑',
      ],
      [
        'keyword'   =>   '尬笑',
      ],

    ];

    $data2 = [
      [
        'article_id'   =>   rand(1, 3),
        'key_id'   =>   rand(1, 4),
      ],
      [
        'article_id'   =>   rand(1, 3),
        'key_id'   =>   rand(1, 4),
      ],
      [
        'article_id'   =>   rand(1, 3),
        'key_id'   =>   rand(1, 4),
      ],
      [
        'article_id'   =>   rand(1, 3),
        'key_id'   =>   rand(1, 4),
      ],

    ];
    DB::table('keyword')->insert($data1);
    DB::table('relation')->insert($data2);
  }
}
