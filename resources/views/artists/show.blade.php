@extends('layout')

@section('content')

<div id="fullpagefeature">
    <div class="release_container">
        <img src="http://cdn.beggars.com/fourad/site/images/artists/desktop_header/{{ $artist->desktop_header_image_url }}"
             alt="{{ $artist->name }} - title" />
        <br />
        <div class="release_info"
             style="font-size:2em;">
            <em>{{ $artist->name }}</em>
            <div class="divide"></div>
            <div id="artist_socials">

                @foreach ($artist->sociallinks as $link)
                    <a href="{{ $link->link }}"
                       target="_blank">
                       <img src="{{ asset("/images/" . $link->icon) }}"
                            alt="{{ $link->website }}" />
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div><!--homepagefeature-->

@if ( ! empty($artist->biog->bio_opening_statement))
<div class="fullpage_element" id="artist_intro">
    {!! explode("\n", $artist->biog->bio_opening_statement,2)[0] !!}
        <a href="#" class="bio_cont">Read more</a>
   </div>
   <div class="fullpage_element" id="artist_bio" style="display:none;">
    {!! $artist->biog->full_bio !!}
    </div>
</div><!--fullpage_element-->
@endif

@if ( count($artist->viewableAlbums))
<div class="fullpage_element" id="release_related">
	<h3 class="releases_subheader">Releases</h3>

    <h2 class="artist_releases_sub">ALBUMS</h2>

    <ul id="artist_grid">

        @foreach ($artist->viewableAlbums as $release)

        <li>
           <a href="{{ action('ReleasesController@show', $release->id) }}">
                <div class="release_container">
                   @if (strpos($release->packshot_url, 'http') === 0)
                   <img src="{{ $release->packshot_url }}"
                        alt="{{ $artist->name }} {{ $release->title }}">
                   @else
                   <img src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/releases/packshots/{{ $release->packshot_url }}"
                        alt="{{ $artist->name }} {{ $release->title }}">
                   @endif
                   <br/>
                   <div class="release_info">
                       <em>{{ $release->title }}</em>
                       <div class="divide"></div>
                       {{ $release->release_date->toFormattedDateString() }}
                   </div>
               </div>

                <span class="tk-franklin-gothic-urw-cond">More info</span>
            </a>
        </li>

        @endforeach
    </ul>


</div><!--fullpage_element-->
@endif

@if ( count($artist->viewableSingles))
    <div class="fullpage_element" id="release_related">


        <h2 class="artist_releases_sub">SINGLES & EPS</h2>

        <ul id="artist_grid">

            @foreach ($artist->viewableSingles as $release)

                <li>
                      <a href="{{ action('ReleasesController@show', $release->id) }}">
                        <div class="release_container">
                            @if (strpos($release->packshot_url, 'http') === 0)
                                <img src="{{ $release->packshot_url }}"
                                     alt="{{ $artist->name }} {{ $release->title }}">
                            @else
                                <img src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/releases/packshots/{{ $release->packshot_url }}"
                                     alt="{{ $artist->name }} {{ $release->title }}">
                            @endif
                            <br/>
                            <div class="release_info">
                                <em>{{ $release->title }}</em>
                                <div class="divide"></div>
                                {{ $release->release_date->toFormattedDateString() }}
                            </div>
                        </div>
                        <span class="tk-franklin-gothic-urw-cond">More info</span>
                    </a>
                </li>

            @endforeach
        </ul>


    </div><!--fullpage_element-->
@endif

@if ( count($artist->viewableComps) )
<div class="fullpage_element" id="release_related">


    <h2 class="artist_releases_sub">Compilations</h2>

    <ul id="artist_grid">

        @foreach ($artist->viewableComps as $release)

            <li>

               <a href="{{ action('ReleasesController@show', $release->id) }}">

                    <div class="release_container">
                        @if (strpos($release->packshot_url, 'http') === 0)
                            <img src="{{ $release->packshot_url }}"
                                 alt="{{ $artist->name }} {{ $release->title }}">
                        @else
                            <img src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/releases/packshots/{{ $release->packshot_url }}"
                                 alt="{{ $artist->name }} {{ $release->title }}">
                        @endif
                        <br/>
                        <div class="release_info">
                            <em>{{ $release->title }}</em>
                            <div class="divide"></div>
                            {{ $release->release_date->toFormattedDateString() }}
                        </div>
                    </div>
                        <span class="tk-franklin-gothic-urw-cond">More info</span>
                </a>
            </li>

        @endforeach
    </ul>


</div><!--fullpage_element-->
@endif



@if ( count($artist->eightNews) )
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">News</h3>
    <ul id="artist_headlines">

     @foreach ($artist->eightNews as $article)

            <li>
                <a href="{{ action('NewsController@news_redirect', [$article->day,
                $article->month, $article->year, $article->slug]) }}">
                    <div class="release_container">
                        @if ($article->listing_image_path)
                        <img src="http://cdn.beggars.com/fourad/site/images/news/listings/{{ $article->listing_image_path }}"
                             alt="{{ $artist->name }} - {{ $article->slug }}">
                        @else
                        <img src="http://cdn.beggars.com/fourad/site/images/artists/listing/{{ $artist->listing_image_url }}"
                             alt="{{ $artist->name }} - {{ $article->slug }}">
                        @endif
                        <br>
                        <div class="release_info">
                            <em>{{ $article->headline }}</em>
                            <div class="divide"></div>
                            {{ $article->date_posted->toFormattedDateString() }}
                        </div>
                    </div>
                </a>
            </li>

     @endforeach

        <div class="morenews"><a href="{{ action('NewsController@artist_news', $artist->slug) }}">More News</a></div>

    </ul>
</div><!--fullpage_element-->
@endif

@if ( count($artist->videos) )
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">Videos</h3>
    <ul>
        @foreach ($artist->videos as $video)
        <li>
            <a class="nivoplayer"
               href="{{ $video->youtube_link }}">
               <div class="release_container">
                   @if (! empty($video->still_image_path) )
                   <img src="http://cdn.beggars.com/fourad/site/images/videos/stills/{{ $video->still_image_path }}"
                        alt="{{ $artist->name }} - {{ $video->title }}" />
                   @else
                   <img src="/images/default_video.jpg"
                        alt="{{ $artist->name }} - {{ $video->title }}">
                   @endif
                   <img src="/images/playbtn.png"
                        class="playbtn">
                   <br />
                   <div class="release_info">
                       <em>{{ $video->title }}</em>
                   </div>
               </div>
            </a>
        </li>
        @endforeach
          </ul>
</div><!--fullpage_element-->
@endif

@if (count($artist->playlists))
<div class="fullpage_element" id="release_related">


    <h3 class="releases_subheader">Playlists</h3>

    <ul id="artist_headlines">
        @foreach ($artist->playlists as $playlist)
         <li>
             <a href="{{ $playlist->link }}">
                 <div class="release_container">
                     <img src="http://cdn.beggars.com/fourad/site/images/playlists/{{ $playlist->image_path }}"/>
                     <br><div class="release_info">
                         <em>{{ $playlist->title }}</em>
                         <div class="divide"></div>
                         Listen
                     </div>
                 </div>
             </a>
         </li>
        @endforeach
    </ul>

    {{--<ul>--}}
        {{--@foreach ($artist->playlists as $playlist)--}}
            {{--<li>--}}
                {{--@if ($playlist->image_path)--}}
                    {{--<img src="http://cdn.beggars.com/fourad/site/images/playlists/{{ $playlist->image_path }}"/>--}}
                {{--@endif--}}
                {{--<a href="{{ $playlist->link }}">{{ $playlist->title }}</a>--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}

</div>
@endif

@if ( count($artist->sessions) )
    <div class="fullpage_element" id="release_related">

        <h3 class="releases_subheader">Sessions</h3>
        <ul>
            @foreach ($artist->sessions as $video)
                <li>
                    <a class="nivoplayer"
                       href="{{ $video->youtube_link }}">
                        <div class="release_container">
                            @if (! empty($video->still_image_path) )
                                <img src="http://cdn.beggars.com/fourad/site/images/videos/stills/{{ $video->still_image_path }}"
                                     alt="{{ $artist->name }} - {{ $video->title }}" />
                            @else
                                <img src="/images/default_video.jpg"
                                     alt="{{ $artist->name }} - {{ $video->title }}">
                            @endif
                            <img src="/images/playbtn.png"
                                 class="playbtn">
                            <br />
                            <div class="release_info">
                                <em>{{ $video->title }}</em>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div><!--fullpage_element-->
@endif

@if ($artist->show_tour_dates)
<div class="fullpage_element" id="release_related">
    <h3 class="releases_subheader">Tour Dates</h3>
    <a href="{{ $artist->songkick_link_url }}" class="songkick-widget" data-theme="light" data-background-color="transparent">{{ $artist->name }} Tour Dates</a>
    <script src="//widget.songkick.com/widget.js"></script>

</div><!--fullpage_element-->
@endif

@if (count($artist->sleevenotes))
    <div class="fullpage_element" id="artist_foreword">

        <h3 class="releases_subheader">Foreword</h3>

    @foreach ($artist->sleevenotes as $foreword)

            <div class="sleevenotes_item">
                <a href="{{ $foreword->link }}">
                    <img src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/sleevenotes/desktop/{{ $foreword->desktop_image_path }}"
                         alt="Artist - title"
                         class="sleevenotes_full" />
                </a>
                <div class="sleevenotes_text">
                    <h2><a href="{{ $foreword->link }}">{{ $foreword->title }}</a></h2>

                    <p>{{ $foreword->author }}</p>
                    <p><em>{{ $foreword->excerpt }}</em></p>
                    <p><a href="{{ $foreword->link }}">Read More</a></p>
                </div>
            </div>

        @endforeach

    </div>
@endif

</div><!--fullpage_element-->
@stop

@section('additional-scripts')
@endsection
