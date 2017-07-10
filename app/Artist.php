<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //use Territorial;

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

    public function sociallinks() {
      return $this->hasMany('App\ArtistSociallink')
        ->orderBy('display_order');
    }

    public function biog() {
      return $this->hasOne('App\ArtistBio');
    }

    public function eightNews() {
      return $this->belongsToMany('App\News')
        ->orderBy('display_order', 'asc')
        ->orderBy('date_posted', 'desc')
        ->where('is_live', true)
        ->limit(8);
    }

    public function videos() {
      return $this->hasMany('App\Video')
        ->where('is_4ad_session', false)
        ->viewable()
        ->orderBy('id', 'DESC');
    }

    public function sessions() {
      return $this->hasMany('App\Video')
        ->where('is_4ad_session', true)
        ->viewable()
        ->orderBy('id', 'DESC');
    }

    public function playlists() {
      return $this->belongsToMany('App\Playlist')
        ->where('is_live', true);
    }

    public function viewableAlbums()
    {
        return $this->belongsToMany('App\Release')
            ->where('release_type', 'album')
            ->orderBy('release_date', 'desc')
            ->viewable();
    }

    public function viewableSingles()
    {
        return $this->belongsToMany('App\Release')
            ->where('release_type', 'single')
            ->orWhere('release_type', 'ep')
            ->orderBy('release_date', 'desc')
            ->viewable();
    }

    public function viewableComps()
    {
        return $this->belongsToMany('App\Release')
            ->where('release_type', 'comp')
            ->orderBy('release_date', 'desc')
            ->viewable();
    }

    public function sleevenotes()
    {
      return $this->belongsToMany('App\Sleevenote')
        ->orderBy('id', 'desc');
    }

    public function scopeWithRelationships($query) {
      return $query->with([
        'biog' => function($q) {
          $q->forZone();
        },
        'sociallinks' => function($q) {
          $q->where('is_live', true);
        },
        'eightNews' => function($q) {
          $q->forZone();
        },
        'viewableAlbums',
        'viewableSingles',
        'viewableComps',
        'sleevenotes'
      ]);
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
