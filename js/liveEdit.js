var liveEditorController = {
	'params' : {
		'mceInitialized' : false
	},
	'init' : function(){
		console.log('liveEditorController->init');
		
		this.openEditor();
		//this.closeEditor();
		this.themeSelectorListener();
	},
	closeEditor : function(){
		$("#close").on('click',function(){
			$(".element.active").removeClass('active');
			$(".editZone").addClass('inactive');
			setTimeout(function(){
				//tinyMCE.activeEditor.destroy();
			}, 2000);
		});
	},
	'openEditor' : function(){
		//$(".element").on('click', function(){
			//var self = $(this),
			//index = self.index();
			$(".element.active").removeClass('active');
			$(this).addClass('active');
			$(".editZone").removeClass('inactive');
			if(liveEditorController.params.mceInitialized == false){
				liveEditorController.startTinyMCE();							
			}else{
				liveEditorController.setActiveElementContent();	
			}
		//});
	},
	'themeSelectorListener' : function(){
		$("#themeSelector").on('change', function(){
			var selected = $('#themeSelector option:selected').val();
			console.log(selected);
			liveEditorController.getTheme(selected);
		});
	},
	'getTheme' : function(selected){
		$.ajax({
		  url: "templates/"+selected,
		  context: document.body
		}).done(function(data) {
			liveEditorController.setActiveElementContent(data);
		    $("#pageContainer").empty().html(data);
		});
	},
	setActiveElementContent : function(data){
		//var elementContent = $(".element.active").html();
		tinyMCE.activeEditor.setContent(data, {format : 'raw'});
	},
	startTinyMCE : function(){
		console.log("Initializing TinyMCE");
		tinymce.init({
		    selector: "#mceZone",
		    theme: "modern",
		    width: '100%',
		    height: 150,
		    plugins: [
		         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		         "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   content_css: "css/content.css",
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
		        {title: 'Bold text', inline: 'b'},
		        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		        {title: 'Example 1', inline: 'span', classes: 'example1'},
		        {title: 'Example 2', inline: 'span', classes: 'example2'},
		        {title: 'Table styles'},
		        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		    ],
		    init_instance_callback : "liveEditorController.setActiveElementContent",
		    setup: function(editor) {
		        editor.on('change', function(e) {
		            console.log('change event', e);
		            var content = tinyMCE.activeEditor.getContent({format : 'raw'});
		            $("#pageContainer").html(content);
		        });
		    }
		 });
		liveEditorController.params.mceInitialized = true;
	}
}
liveEditorController.init();