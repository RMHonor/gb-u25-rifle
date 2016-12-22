$("#save").click(function(e){
	var $fields = $('.member'),
		json = [];
	
	$fields.each( function(i){
		json.push({ 
			pos   : encodeURIComponent($(this).find('.pos').val()),
			name  : encodeURIComponent($(this).find('.name').val()),
			title : encodeURIComponent($(this).find('.title').val()),
			bio   : encodeURIComponent(tinyMCE.editors[i].getContent()),
			img   : encodeURIComponent($(this).find('.img').val())
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
			},
			501: function(){
				alert("Server encountered error inserting data so reverted. Please try reformatting data");
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
			"name"  : encodeURIComponent($('.name').val()),
			"title" : encodeURIComponent($('.title').val()),
			"bio"   : encodeURIComponent(tinyMCE.get('bio').getContent()),
			"img"   : encodeURIComponent($('.img').val())
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

$(".delete").click(function(e){
	var id = $(this).parent().attr("id"),
		name = $(this).parent().find(".name").val();
	if (confirm("Do you really want to delete " + name + "?")){
		$.ajax({
			type: "DELETE",
			url: "/php/admin/delete/team.php",
			data: JSON.stringify({"id": id}),
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			statusCode: {
				200: function(){
					alert("Team member deleted successfully");
					location.reload();
				},
				400: function(){
					alert("Delete failed");
				},
				401: function(){
					alert("Delete failed");
				},
				500: function(){
					alert("Delete failed");
				}
			},
			error: function(a, status, b){
				if (status == "timeout"){
					alert("Delete failed");
				}
			}
		});
	}
});

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}