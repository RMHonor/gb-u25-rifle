$('[id^="member-"]').click(function() {
	var id = $(this).attr('id').substr(7);
	
	$('#popup-' + id).css("display", "block");
});

$(window).click(function(e){
	if ($(e.target).is('.modal')){
		$('.modal').css("display", "none");
	}
});

$('.close').click(function() {
    $('.modal').css("display", "none");
});