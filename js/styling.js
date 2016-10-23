var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

$('.article').hover(function(){
	$(this).children('.content').addClass('hover');
}, function() {
	$(this).children('.content').removeClass('hover');
});