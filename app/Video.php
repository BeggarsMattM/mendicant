<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function artist() {
      return $this->belongsTo('App\Artist');
    }

    public function scopeViewable($query) {
      return $query->where('is_live', true);
    }

    public function getSrcAttribute() {
      return $this->still_image_path
        ? "http://cdn.beggars.com/fourad/site/images/videos/stills/" . $this->still_image_path
        : "/images/default_video.jpg";
    }

    public function getAltAttribute() {
      return $this->artist->name . " - " . $this->title;
    }
}
