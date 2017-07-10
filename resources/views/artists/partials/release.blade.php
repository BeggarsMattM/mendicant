<li>
   <a href="{{ action('ReleasesController@show', $release->id) }}">
        <div class="release_container">
           @if (strpos($release->packshot_url, 'http') === 0)
           <img src="{{ $release->packshot_url }}"
                alt="{{ $release->artist->name }} {{ $release->title }}">
           @else
           <img src="https://s3-eu-west-1.amazonaws.com/cdn.beggars.com/fourad/site/images/releases/packshots/{{ $release->packshot_url }}"
                alt="{{ $release->artist->name }} {{ $release->title }}">
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
