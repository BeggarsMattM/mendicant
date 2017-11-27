<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\FourADArtistsRepository as Artists;


class ArtistsController extends FourADController
{
    private $artists;

    public function __construct(Artists $artists) {
      parent::__construct();
      $this->artists = $artists;
    }

    public function index() {

      $current_artists = $this->artists->forIndex();
      $alpha_artists   = $this->artists->alpha();

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
