jQuery(document).ready(function(){  
	    jQuery(function() {
	        jQuery( "#top_links" ).buttonset();

	    });

	    //clicking radio buttons functionality
		jQuery("#radio1").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/users/";
	    });
	    jQuery("#radio2").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/clients/";
	    });
	    jQuery("#radio3").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/resources/";
	    });
            jQuery("#radio4").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/organizations/";
	    });
	    jQuery("#radio5").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/reports/";
	    });
	    jQuery("#radio6").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/feedbacks/";
	    });
	    jQuery("#radio7").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/admin/";
	    });
	    jQuery("#radio8").click(function () {
			//window.location.href = "http://localhost/mission_columbia_baked/help/";
			//jQuery('#radio').toggle();
	    });
	});