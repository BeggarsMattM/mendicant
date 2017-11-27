@extends('layout')

@section('content')

    <div class="listpage_element" id="homepage_news">
    <h5 id="header_news"><span>News</span></h5>
    <ul>

        @foreach ($news as $item)
            @if (count($item->artists))
        <li>
            <a href="{{ action('NewsController@show', [
                'day' => $item->day,
                'month' => $item->month,
                'year' => $item->year,
                'slug' => $item->slug
                ]) }}">
                <div class="release_container">
                    @if ($item->listing_image_path)
                    <img src="http://cdn.beggars.com/fourad/site/images/news/listings/{{ $item->listing_image_path }}"
                         alt="{{ $item->artists[0]->name }} - {{ $item->headline }}" />
                     @else
                     <img src="http://cdn.beggars.com/fourad/site/images/artists/listing/{{ $item->artists[0]->listing_image_url }}"
                          alt="{{ $item->artists[0]->name }}"/>
                    @endif
                    <br />
                    <div class="release_info">
                        <em>{{ $item->headline }} {{ $item->month }}</em>
                        <div class="divide"></div>
                        {{ implode(',', $item->artists->pluck('name')->toArray()) }}
                    </div>
                </div>
            </a>
        </li>
            @endif
        @endforeach

    </ul>

    <div class="pager">
        <ul>
            @for ($page = 1; $page <= $news->lastPage(); $page++)
            <li><a href="{{ $news->url($page) }}">{{ $page }}</a></li>
            @endfor
        </ul>
        <a class="prev" href="{{ $news->previousPageUrl() }}">Prev</a>
        <a class="next" href="{{ $news->nextPageUrl() }}">Next</a></div><!--pager-->
@stop
