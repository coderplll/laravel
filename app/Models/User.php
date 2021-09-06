<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;
  protected $table = 'user';
  public $timestamps = false;
  //create方法,必须定义
  protected $fillable = ['name', 'age', 'email', 'avatar'];

  //增
  public function Test()
  {
    $int = $this->insert([
      'name' => '小黑',
      'age' => 22,
      'email' => 'xiaohei@163.com',
      'avatar' => '/storage/app/b5695cee.jpg'
    ]);
    return $int;
  }

  //查
  public function Test1()
  {
    return $this->get();
  }

  //改
  public function Test2()
  {
    return $this->where('id', '2')->update(['name' => 'aaa']);
  }
  //删
  public function Test3()
  {
    return $this->where('id', '1')->delete();
  }
  //分页
  public function fenye()
  {
    return $this->paginate(3);
  }
}
