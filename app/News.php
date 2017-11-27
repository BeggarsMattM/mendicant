<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = '4ad';

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

    public function scopeViewable($query)
    {
      return $query->where('is_live', true)
        ->has('artists')
        ->where(function($query) {
          $query->where('golive_date', '0000-00-00 00:00:00')
                  ->orWhere('golive_date', '<=', date('Y-m-d H:i', time()));
        });
    }
}
