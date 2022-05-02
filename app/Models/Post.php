<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  public function animal()
  {
    return $this->belongsTo(Animal::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function requests()
  {
    return $this->hasMany(Request::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public function favorites()
  {
    return $this->hasMany(Favorite::class);
  }
}
