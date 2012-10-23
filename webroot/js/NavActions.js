jQuery(document).ready(function(){  
	    jQuery(function() {
	        jQuery( "#top_links" ).buttonset();
	        //checkContext();
	    });

	    //clicking radio buttons functionality
		jQuery("#radio1").click(function () {
			window.location.href = "http://localhost/mission_columbia_baked/users/";
	    });
	    jQuery("#radio2").click(function () {

			location.href = $('#clients').attr('href');
			// jQuery('div.tipsContent').replaceWith("<B>Tipzzzzz</B>");

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

function checkContext(){
	// alert("InCheckContext");

	// var url = window.location.href;
	// var host = window.location.host;
	var pathName = window.location.pathname;
	if(pathName.indexOf('/mission_columbia_baked/users/login') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT THE LOGIN</B> BLEH BLAH BLAH BLAH" +  
			"BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH " + 
			"BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH ");
		// alert("in login " + pathName);
	}
	else if(pathName.indexOf('/mission_columbia_baked/resources') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT resources Page</B>");
		// alert("in resources " +  pathName);
	}
	else if(pathName.indexOf('/mission_columbia_baked/organizations') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT organizations Page</B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/reports') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT reports Page</B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/admin') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT admin Page</B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/help') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT help Page</B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT THE CLIENTS PAGE!</B>");
	}
	// else if(url.indexOf('http://localhost/mission_columbia_baked/clients/searchResults') != -1) {
	// 	jQuery('div.tipsContent').replaceWith("<B>AT THE CLIENT SEARCH RESULTS PAGE</B>");

	// 	alert("cleint search");
	// }

}