<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistBio extends Model
{
    public function scopeForZone($query) {
      return $query->where('territory_id', session('territory'));
    }
}
