$("#save").click(function(e){
	var data = "";
	data += "welcome-sub=" + $('#welcome-sub').val();
	data += "&captain-img=" + $('#captain-img').val();
	data += "&welcome=" + tinyMCE.get('welcome').getContent();
	data += "&updates=" + tinyMCE.get('updates').getContent();
	data += "&sponsorship=" + tinyMCE.get('sponsorship').getContent();
	$.ajax({
		type: "POST",
		url: "/php/admin/save/home.php",
		data: data,
		statusCode: {
			200: function(){
				alert("Content saved successfully");
			},
			400: function(){
				alert("Content save failed");
			},
			401: function(){
				alert("Content save failed");
			},
			500: function(){
				alert("Content save failed");
			}
		},
		error: function(a, status, b){
			if (status == "timeout"){
				alert("Content save failed");
			}
		} 
	});
});