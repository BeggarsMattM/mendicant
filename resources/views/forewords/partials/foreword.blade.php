<div class="sleevenotes_item">
    <a href="{{ $foreword->link }}">
        <img src="{{ $foreword->src }}"
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
