<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  use HasFactory;
  protected $table = 'keyword';
  public $timestamps = false;
}
