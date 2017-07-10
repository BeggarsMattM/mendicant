<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistBio extends Model
{
    public function scopeForZone($query) {
      return $query->where('territory_id', session('territory'));
    }

    public function getOneParaOpeningStatementAttribute() {
      return explode("\n", $this->bio_opening_statement, 2)[0];
    }
}
