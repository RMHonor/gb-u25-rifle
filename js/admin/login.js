$(document).ready(function(){
	$('#login').css("display", "block");
});

// input edit event
$('#login input').on('change keyup paste', function(){
	if ($("#login [name='user']").val().length > 0 && $("#login [name='pass']").val().length >= 8){
		$("#login [type='submit']").removeAttr('disabled');
	} else {
		$("#login [type='submit']").attr('disabled', 'disabled');
	}
});


// handle form submission
$("#login").submit(function(e){
	e.preventDefault();
	if ($("#login [name='user']").val() == "" || $("#login [name='pass']").val() == ""){
		//TODO
		return;
	}
	$("#error").html("");
	$("#login [type='submit']").attr('disabled');
	$("#status").removeAttr('style');
	$.ajax({
		type: "POST",
		url: "/php/admin/auth.php",
		data: $("#login").serialize(),
		statusCode: {
			200: function(){
				$(location).attr("href", "/admin");
			},
			400: function(){
				$("#status").html("Please enter both a username and password");
				//TODO
			},
			401: function(){
				$("#status").html("Invalid username or password");
				//TODO
			},
			500: function(){
				$("#status").html("Internal server error, please try again");
				//TODO
			}
		},
		error: function(a, status, b){
			if (status == "timeout"){
				$("#status").html("Connection timed out");
			}
		} 
	});
	
	$("#login [type='submit']").removeAttr('disabled');
})