<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AuthorTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $data = [
      [
        'author_name'   =>   '张三'
      ],
      [
        'author_name'   =>   '李四',
      ],
      [
        'author_name'   =>   '王五',
      ],

    ];
    DB::table('author')->insert($data);
  }
}
