@extends('layout')

@section('content')
<div class="listpage_element" id="homepage_news">

  <h5 id="header_artists"><span>Artists</span></h5>

  <ul id="artists_current">
    @each('artists.partials.current', $current_artists, 'artist')
	</ul>

  <ul id="artist_letters" class="tk-franklin-gothic-urw-cond">
    @include('artists.partials.letters_nav')
	</ul>

  <div id="artistlistboundary">
		<ul id="artistlistingmain" class="tk-franklin-gothic-urw-cond">
      @each('artists.partials.letter_group', $alpha_artists, 'artist')
    </ul><!--artistlistingmain-->
	</div>

</div><!--homepage_element-->
@stop

@section('additional-scripts')
<script>
	$(document).ready(function(){
		var aTag = $("a[name^='artists_']");
        heights = [];
		$.each(aTag, function(i, val) {
			heights[val.name] = $("a[name='" + val.name + "']").offset().top;
		});
		console.log(heights);

        $(".artistletteranchor").click(function(e){
            e.preventDefault();
            var href = $(this).attr('href').replace('#', '');
            scrollToAnchor(href);
        });

	});

	function scrollToAnchor(aid) {
		$('#artistlistingmain').animate({"margin-top": heights['artists_no'] - heights['artists_' + aid]}, 'slow');
	}
</script>
@stop
