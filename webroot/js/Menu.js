jQuery(document).ready(function(){  
	    jQuery(function() {
	        jQuery( "#top_links" ).buttonset();

	    });

	    //clicking radio buttons functionality
		jQuery("#radio1").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/users/";
	    });
	    jQuery("#radio2").click(function () {
			location.href = $('#clients').attr('href');
	    });
	    jQuery("#radio3").click(function () {
			location.href = $('#resources').attr('href');
	    });
        jQuery("#radio4").click(function () {
			location.href = $('#organizations').attr('href');
	    });
	    jQuery("#radio5").click(function () {
			location.href = $('#reports').attr('href');
	    });
	    jQuery("#radio6").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/feedbacks/";
	    });
	    jQuery("#radio7").click(function () {
			location.href = $('#admin').attr('href');
	    });
	    jQuery("#radio8").click(function () {
			//window.location.href = "http://localhost/mission_columbia_baked/help/";
			//jQuery('#radio').toggle();
	    });
	});