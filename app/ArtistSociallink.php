<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistSociallink extends Model
{
  public function getIconAttribute() {
      switch ($this->website) {
          case 'Facebook':
              return 'icon_facebook.png';
          case 'Discogs':
              return 'icon_discogs.png';
          case 'Spotify':
              return 'icon_spotify.png';
          case 'YouTube':
              return 'icon_tumblr.png';
          case 'Twitter':
              return 'icon_twitter.png';
          case 'Tumblr':
              return 'icon_tumblr.png';
          case 'Instagram':
              return 'icon_instagram.png';
          default:
              return 'icon_website.png';
      }
  }
}
