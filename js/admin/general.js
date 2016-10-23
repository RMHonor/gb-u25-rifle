$('document').ready(function(){
	tinymce.init({
		selector: 'textarea',
		height: 200,
		width: 1000,
		content_css: "/css/style.css, /css/admin/tinymce.css",
		plugins: "link image",
		setup : function(ed){
			ed.on('init', function() 
			{
				this.getDoc().body.style.fontSize = '14px';
				this.getDoc().body.style.fontFamily = 'sans-serif';
			});
		},
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	$('.editor').attr('display', 'initial');
});


