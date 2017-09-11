<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;

class ArtistsController extends FourADController
{
    public function index() {

      $current_artists = Artist::current()->orderBy('name')->get();
      $alpha_artists   = Artist::getAlphaArtists();

      return view('artists.index', compact('current_artists', 'alpha_artists'));

    }

    public function show($id) {

      $artist = Artist::viewable()
        ->withRelationships();

      $artist = is_numeric($id)
        ? $artist->find($id)
        : $artist->whereSlug($id)->first();

      if (! $artist ) abort(404);

      return view('artists.show', compact('artist'));

    }
}
