<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PaperTableSeeder extends Seeder
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
        'paper_name'   =>   '诗经',
      ],
      [
        'paper_name'   =>   '小说',
      ],
    ];
    DB::table('paper')->insert($data);
  }
}
