<?php namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Exception\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class Repository implements RepositoryInterface {

  private $app;

  protected $model;

  public function __construct(App $app) {
    $this->app = $app;
    $this->makeModel();
  }

  abstract function model();

  public function makeModel() {
    $model = $this->app->make($this->model());

    if (!$model instanceof Model)
      throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

    return $this->model = $model;
  }

}
