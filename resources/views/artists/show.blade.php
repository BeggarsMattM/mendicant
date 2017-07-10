@extends('layout')

@section('content')

<div id="fullpagefeature">

    <div class="release_container">

        <img src="{{ $artist->header_src }}"
             alt="{{ $artist->name }} - title" />

        <br />

        <div class="release_info"
             style="font-size:2em;">
            <em>{{ $artist->name }}</em>
            <div class="divide"></div>
            <div id="artist_socials">
                @each('artists.partials.social_link', $artist->sociallinks, 'link')
            </div>
        </div>

    </div>

</div><!--homepagefeature-->

@include('artists.partials.biog', ['biog' => $artist->biog])

@if (count($artist->viewableAlbums))
<div class="fullpage_element" id="release_related">

  <h3 class="releases_subheader">Releases</h3>

    <h2 class="artist_releases_sub">ALBUMS</h2>

    <ul id="artist_grid">

      @each('artists.partials.release', $artist->viewableAlbums, 'release')

    </ul>

</div><!--fullpage_element-->
@endif

@if (count($artist->viewableSingles))
<div class="fullpage_element" id="release_related">

    <h2 class="artist_releases_sub">SINGLES & EPS</h2>

    <ul id="artist_grid">

      @each('artists.partials.release', $artist->viewableSingles, 'release')

    </ul>

</div><!--fullpage_element-->
@endif

@if (count($artist->viewableComps) )
<div class="fullpage_element" id="release_related">

    <h2 class="artist_releases_sub">Compilations</h2>

    <ul id="artist_grid">

      @each('artists.partials.release', $artist->viewableComps, 'release')

    </ul>

</div><!--fullpage_element-->
@endif



@if ( count($artist->eightNews) )
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">News</h3>

    <ul id="artist_headlines">

        @each('news.partials.article', $artist->eightNews, 'article');

        <div class="morenews">

          <a href="{{ action('NewsController@artist_news', $artist->slug) }}">More News</a>

        </div>

    </ul>

</div><!--fullpage_element-->
@endif

@if ( count($artist->videos) )
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">Videos</h3>

    <ul>

        @each('videos.partials.video', $artist->videos, 'video')

    </ul>

</div><!--fullpage_element-->
@endif

@if (count($artist->playlists))
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">Playlists</h3>

    <ul id="artist_headlines">

      @each('playlists.partials.playlist', $artist->playlists, 'playlist')

    </ul>

</div>
@endif

@if (count($artist->sessions) )
    <div class="fullpage_element" id="release_related">

        <h3 class="releases_subheader">Sessions</h3>
        <ul>
          @each('videos.partials.video', $artist->sessions, 'video')
        </ul>
    </div><!--fullpage_element-->
@endif

@if ($artist->show_tour_dates)
<div class="fullpage_element" id="release_related">

    <h3 class="releases_subheader">Tour Dates</h3>
    <a href="{{ $artist->songkick_link_url }}"
       class="songkick-widget"
       data-theme="light"
       data-background-color="transparent">{{ $artist->name }} Tour Dates</a>
    <script src="//widget.songkick.com/widget.js"></script>

</div><!--fullpage_element-->
@endif

@if (count($artist->sleevenotes))
<div class="fullpage_element" id="artist_foreword">

    <h3 class="releases_subheader">Foreword</h3>

    @each ('forewords.partials.foreword', $artist->sleevenotes, 'foreword')

</div>
@endif

</div><!--fullpage_element-->
@stop

@section('additional-scripts')
@endsection
