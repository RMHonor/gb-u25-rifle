$("#save").click(function(e){
	var $fields = $('.member'),
		json = [];
	
	$fields.each( function(i){
		json.push({ 
			pos   : $(this).find('.pos').val().replace("'","''"),
			name  : $(this).find('.name').val().replace("'","''"),
			title : $(this).find('.title').val().replace("'","''"),
			bio   : tinyMCE.editors[i].getContent().replace("'","''"),
			img   : $(this).find('.img').val().replace("'","''")
		});
	});

	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + decodeHtml(JSON.stringify(json)) + "&type=team",
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
			"name"  : $('.name').val().replace("'","''"),
			"title" : $('.title').val().replace("'","''"),
			"bio"   : tinyMCE.get('bio').getContent().replace("'","''"),
			"img"   : encodeURIComponent($('.img').val().replace("'","''"))
		}];
	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + decodeHtml(JSON.stringify(json)) + "&type=single",
		statusCode: {
			200: function(){
				alert("Team member added successfully");
				window.location.replace('/admin/team');
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

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}