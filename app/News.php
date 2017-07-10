<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $dates = ['date_posted'];

    public function artists()
    {
      return $this->belongsToMany('App\Artist');
    }

    public function territories() {
      return $this->belongsToMany('App\Territory');
    }

    public function scopeForZone($query) {
      return $query->whereHas('territories', function ($q) {
        return $q->where('territories.id', session('territory'));
      });
    }
}
