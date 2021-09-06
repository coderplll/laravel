<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;
  protected $table = 'article';
  public $timestamps = false;
  //create方法,必须定义
  protected $fillable = ['id', 'article_name', 'author_id'];
  //关联author,一对一
  public function author()
  {
    return $this->hasOne('App\Models\Home\Author', 'id', 'author_id');
  }

  //关联comment,一对多
  public function comment()
  {
    return $this->hasMany('App\Models\Home\Comment', 'article_id', 'id');
  }

  //关联keyword,多对多
  public function keyword()
  {
    return $this->belongsToMany('App\Models\Home\Keyword', 'relation', 'article_id', 'key_id');
  }
}
