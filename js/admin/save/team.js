$("#save").click(function(e){
	var $fields = $('.member'),
		json = [];
	
	$fields.each( function(){
		json.push({ 
			"pos"   : $(this).find('.pos').val(),
			"name"  : $(this).find('.name').val(),
			"title" : $(this).find('.title').val(),
			"bio"   : $(this).find('.bio').val(),
			"img"   : encodeURIComponent($(this).find('.img').val())
		});
	});
	
	console.log(JSON.stringify(json));
	
	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + JSON.stringify(json),
		statusCode: {
			200: function(){
				alert("Team updated successfully");
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

$("#save-new").click(function(e){
	var $fields = $('.member'),
		json = [{
			"name"  : $('.name').val(),
			"title" : $('.title').val(),
			"bio"   : tinyMCE.get('bio').getContent(),
			"img"   : encodeURIComponent($('.img').val())
		}];
	console.log(JSON.stringify(json));
	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + JSON.stringify(json),
		statusCode: {
			200: function(){
				alert("Team member added successfully");
				//window.location.replace('/admin/team');
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
	}).done(function(content){
		console.log(content);
	});
});