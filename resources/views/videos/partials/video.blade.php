<li>
    <a class="nivoplayer"
       href="{{ $video->youtube_link }}">
       <div class="release_container">
           <img src="{{ $video->src }}"
                alt="{{ $video->alt }}" />
           <img src="/images/playbtn.png"
                class="playbtn">
           <br />
           <div class="release_info">
               <em>{{ $video->title }}</em>
           </div>
       </div>
    </a>
</li>
