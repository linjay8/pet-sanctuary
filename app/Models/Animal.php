<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
  use HasFactory;
  public $timestamps = false;
  public function type()
  {
    return $this->belongsTo(Type::class);
  }
  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
