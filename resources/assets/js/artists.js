$(document).ready(function(){
	var aTag = $("a[name^='artists_']");
	var heights = [];
	$.each(aTag, function(i, val) {
		heights[val.name] = $("a[name='" + val.name + "']").offset().top;
	});
	console.log(heights);
});

function scrollToAnchor(aid) {
	var aTag = $("a[name='artists_" + aid + "']");
	$('#artistlistingmain').animate({"margin-top": heights['artists_no'] - heights['artists_' + aid]}, 'slow');
}
$("a").click(function(e){
	e.preventDefault();
	var href = $(this).attr('href').replace('#', '');
	scrollToAnchor(href);
}); 
