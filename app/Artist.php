<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $connection = '4ad';

    public function scopeCurrent($query) {
      return $query->where('is_current', true);
    }

    public function scopeViewable($query) {
      return $query->where(['is_live' => true, 'is_deleted' => false]);
    }

    public function getNormalizedNameAttribute() {
      $ucname = strtoupper($this->name);
      return strpos($ucname, 'THE ') === 0
        ? substr($ucname, 4)
        : $ucname;
    }

    public function getInitialAttribute() {
      return strtoupper(substr($this->normalized_name, 0, 1));
    }

    public static function getAlphaArtists() {
      return self::viewable()->get()
      ->sortBy(function ($artist) {
          return $artist->normalized_name;
      })
      ->groupBy(function ($artist) {
          return ctype_alpha($artist->initial)
            ? $artist->initial
            : '#';
      });
    }
}
