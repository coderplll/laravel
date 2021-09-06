<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void 创建数据表
   */
  public function up()
  {
    Schema::create('paper', function (Blueprint $table) {
      $table->increments('id');
      $table->string('paper_name', 100)->nullable($value = false);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void  删除数据表
   */
  public function down()
  {
    Schema::dropIfExists('paper');
  }
}
