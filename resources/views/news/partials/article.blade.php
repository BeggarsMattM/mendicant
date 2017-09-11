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
