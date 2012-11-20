$(document).ready( function(){
	$('#controller').change(function(){
		if( $('#controller').val() != '' )
		{
			if( $('#controller > option:first-child').val() == '' )
			{
				$('#controller > option:first-child').remove();
			}
		}
		
		//use ajax to get all the views associated with the selected controller
		$.ajax({
			url: global.base_url + '/frameworkDetails/views/' + $('#controller').val() + '.json',
			dataType: 'json',
			success: updateViewComboBox
		});
	});
	
	$('#view').change(function(){
		$('div.submit > input').removeClass('disabled').off('click');
		if( $('#view').val() != '' )
		{
			if( $('#view > option:first-child').val() == '' )
			{
				$('#view > option:first-child').remove();
			}
		}
		
		//use ajax to see if this tip already exists
		org_id = $('#TipOrganizationId').val();
		controller = $('#controller').val();
		view = $('#view').val();
		$.ajax({
			url: global.base_url + '/tips/checkExistence.json?organization_id=' + org_id + '&controller=' + controller + '&view=' + view,
			dataType: 'json',
			success: determineFurtherAction
		});
	});
	
	function updateViewComboBox(data)
	{
		var select = $('#view');
		select.empty();
		if( data.length > 0 )
		{
			select.append('<option value>Select a view</option>');
			for( var i = 0; i < data.length; i++ )
			{
				select.append('<option value="' + i + '">' + data[i] + '</option>');
			}
			select.removeAttr('disabled');
		}
		else
		{
			select.attr('disabled', 'disabled');
		}
	}
	
	function determineFurtherAction(data)
	{
		console.log('Made it.');
		if( data != false )
		{
			$( "#dialog-duplicate" ).dialog({
	            resizable: false,
	            height:200,
	            modal: true,
	            buttons: {
	                "Edit this tip": function() {
	                    document.location = global.base_url + '/tips/edit/' + data['Tip']['id'];
	                },
	                Cancel: function() {
	                    $( this ).dialog( "close" );
	                    $('div.submit > input').addClass('disabled').on('click', function(event){
	                    	event.preventDefault();
	                    	$( "#dialog-disabled" ).dialog({
	                    		modal: true,
	                    		buttons: {
	                    			Ok: function(){
	                    				$(this).dialog( "close" );
	                    			}
	                    		},
	                    		open: function(event, ui) { 
	                                // Get the dialog 
	                                var dialog = $(event.target).parents(".ui-dialog.ui-widget");
	                                dialog.find('.ui-widget-header').addClass('dialog-duplicate');
	            	            }
	                    	});
	                    });
	                }
	            },
	            open: function(event, ui) { 
                    // Get the dialog 
                    var dialog = $(event.target).parents(".ui-dialog.ui-widget");
                    dialog.find('.ui-widget-header').addClass('dialog-duplicate');
	            }
	        });
		}
		
	}
	
	tinyMCE.init({
	        // General options
	        mode : "textareas",
	        theme : "advanced",
	        plugins : "table,inlinepopups",

	        // Theme options
	        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,removeformat,code",
	        theme_advanced_buttons2 : "",
	        theme_advanced_buttons3 : "",
	        theme_advanced_buttons4 : "",
	        theme_advanced_toolbar_location : "top",
	        theme_advanced_toolbar_align : "left",
	        theme_advanced_statusbar_location : "none",

	        // Example content CSS (should be your site CSS)
	        content_css : global.base_url + "/css/tiny_mce.css",



	        formats : {
	                alignleft : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
	                aligncenter : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
	                alignright : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
	                alignfull : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
	                bold : {inline : 'span', 'classes' : 'bold'},
	                italic : {inline : 'span', 'classes' : 'italic'},
	                underline : {inline : 'span', 'classes' : 'underline', exact : true},
	                strikethrough : {inline : 'del'},
	                customformat : {inline : 'span', styles : {color : '#00ff00', fontSize : '20px'}, attributes : {title : 'My custom format'}}
	        }
	});
});