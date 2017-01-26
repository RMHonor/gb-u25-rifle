$("#save").click(function(e){
	var json = [{
			"name"  : encodeURIComponent($('.name').val()),
			"title" : encodeURIComponent($('.title').val()),
			"bio"   : encodeURIComponent(tinyMCE.get('bio').getContent()),
			"img"   : encodeURIComponent($('.img').val()),
			"id"    : $(this).parent().attr("id")
		}];

	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + decodeHtml(JSON.stringify(json)) + "&type=edit",
		statusCode: {
			200: function(){
				alert("Team member saved");
				window.location.replace("/admin/team")
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
	var json = [{
			"name"  : encodeURIComponent($('.name').val()),
			"title" : encodeURIComponent($('.title').val()),
			"bio"   : encodeURIComponent(tinyMCE.get('bio').getContent()),
			"img"   : encodeURIComponent($('.img').val())
		}];
	$.ajax({
		type: "POST",
		url: "/php/admin/save/team.php",
		data: "json=" + decodeHtml(JSON.stringify(json)) + "&type=new",
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
	var id = $(this).parent().parent().attr("id"),
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
					//location.reload();
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

$(".edit").click(function(e){
	var id = $(this).parent().parent().attr("id");
	window.location("/admin/team/edit/" + id);
});

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}