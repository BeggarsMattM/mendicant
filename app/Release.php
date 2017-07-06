<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $dates = ['release_date'];

    public function scopeViewable($query)
    {
      return $query->where('is_live', true)
          ->where(function($query) {
              $query->where('golive_date', '0000-00-00 00:00:00')
                  ->orWhere('golive_date', '<=', date('Y-m-d H:i', time()));
          });
    }
}
