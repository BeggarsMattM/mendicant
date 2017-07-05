$( "#mobile_nav_artists" ).click(function() {
    $( ".sub_nav" ).fadeToggle( "slow", "linear" );
});




var time = 1000,
        timer;

    function handlerIn() {
        clearTimeout(timer);
        $('.desktop_sub_nav').stop(true).css('display', "inline").show();
    }
    function handlerOut() {
        timer = setTimeout(function() {
            $('.desktop_sub_nav').fadeOut(500);
        }, time);
    }

    $("#artists_holder, .desktop_sub_nav").hover(handlerIn, handlerOut);






$( "#subscribetoggle" ).click(function(e) {
    $( "#subscribeform" ).fadeToggle( "slow", "linear" );
    e.preventDefault();
});
$( "#subscribetoggle2" ).click(function(e) {
    $( ".subscribeform2" ).fadeToggle( "slow", "linear" );
    e.preventDefault();
});

$(document).ready(function(){
    $('a.nivoplayer').nivoLightbox();
    $('.iframe').colorbox({iframe:true, width:'65%', height:'80%'});
    $('.imgGroup').colorbox({rel:'imgGroup'});
    if ($(window).width() < 500) {
		$('.iframe').removeClass();
		$('.imgGroup').removeClass();
	} 
});
$( ".bio_cont" ).click(function(e) {
    $( "#artist_bio" ).fadeToggle( "slow", "linear" );
    ($(".bio_cont").text() === "Read more") ? $(".bio_cont").text("Read less") : $(".bio_cont").text("Read more");
	e.preventDefault();
});