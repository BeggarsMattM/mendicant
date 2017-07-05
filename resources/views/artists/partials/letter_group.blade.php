<li class="artists_letter_anchor">

  <div class="largeartistletterholder">
    <h3 class="largeartistletter">
      <a name="artists_{{ $key === "#" ? 'no' : strtolower($key) }}">{{ $key }}</a>
    </h3>
  </div>

  <ul>
    @each('artists.partials.letter_group_artist_link', $artist, 'artist')
  </ul>

</li>
