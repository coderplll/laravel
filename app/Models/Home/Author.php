<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  use HasFactory;
  protected $table = 'author';
  public $timestamps = false;
  //create方法,必须定义
  protected $fillable = ['id', 'author_name'];
}
