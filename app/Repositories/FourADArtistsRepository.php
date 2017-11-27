<?php namespace App\Repositories;

use App\Repositories\Repository;

class FourADArtistsRepository extends Repository {

  function model()
  {
    return 'App\Artist';
  }

  public function forIndex()
  {
    return $this->model->current()->orderBy('name')->get();
  }

  public function alpha()
  {
    return $this->model->getAlphaArtists();
  }

}
