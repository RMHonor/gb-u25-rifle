$("#save").click(function(e){
	var data = "";
	data += "welcome-sub=" + encodeURIComponent($('#welcome-sub').val());
	data += "&captain-img=" + encodeURIComponent($('#captain-img').val());
	data += "&welcome=" + encodeURIComponent(tinyMCE.get('welcome').getContent());
	data += "&updates=" + encodeURIComponent(tinyMCE.get('updates').getContent());
	data += "&sponsorship=" + encodeURIComponent(tinyMCE.get('sponsorship').getContent());

	$.ajax({
		type: "POST",
		url: "/php/admin/save/home.php",
		data: data.replace("'","''"),
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
		success: function(res){
			console.log(res);
		},
		error: function(a, status, b){
			if (status == "timeout"){
				alert("Content save failed");
			}
			console.log(status);
		} 
	}).done(function(content){
		console.log(content);
	});
});