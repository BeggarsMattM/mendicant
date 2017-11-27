<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController extends FourADController
{
    public function index()
    {
      $news = News::viewable()
        ->with('artists')
        ->orderBy('display_order', 'asc')
        ->orderBy('date_posted', 'desc')
        ->whereHas('territories', function ($query) {
          return $query->where('territories.id', $this->territory);
        })
        ->paginate(18);

        return view('news.index', compact('news'));
    }

    public function show($day, $month, $year, $slug) {
      dd($day, $month);


    }

    public function artist_news() {

    }
}
