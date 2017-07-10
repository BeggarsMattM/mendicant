@if ( ! empty($biog->bio_opening_statement))

<div class="fullpage_element" id="artist_intro">
    {!! $biog->one_para_opening_statement !!}
        <a href="#" class="bio_cont">Read more</a>
   </div>
   <div class="fullpage_element" id="artist_bio" style="display:none;">
    {!! $biog->full_bio !!}
    </div>
</div><!--fullpage_element-->

@endif
