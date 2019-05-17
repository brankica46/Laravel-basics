<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'photo_id'];

    public function photo()
    {
      return $this->belongsTo(Photo::class);
    }
}
