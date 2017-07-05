<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;

class ArtistsController extends FourADController
{
    public function index() {
      $current_artists = Artist::current()->get();
      $alpha_artists   = Artist::getAlphaArtists();
      return view('artists.index', compact('current_artists', 'alpha_artists'));
    }

    public function show($id) {

    }
}
