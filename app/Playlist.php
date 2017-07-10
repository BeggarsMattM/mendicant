<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function artists() {
      return $this->belongsToMany('App\Artist');
    }

    public function getSrcAttribute() {
      return "http://cdn.beggars.com/fourad/site/images/playlists/"
        . $this->image_path;
    }
}
