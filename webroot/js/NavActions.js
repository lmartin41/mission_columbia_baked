jQuery(document).ready(function(){  
	    jQuery(function() {
	        jQuery( "#top_links" ).buttonset();
	        //checkContext();
	    });

	    //clicking radio buttons functionality
		jQuery("#radio1").click(function () {
			window.location.href = global.base_url + "/users/";
	    });
	    jQuery("#radio2").click(function () {

			location.href = global.base_url + "/clients";

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
	    
	    $("#radioUsers").click(function (){
	    	location.href = $('#users').attr('href');
	    });
	    
	    $('#radioCustomize').click(function () {
	    	location.href = $('#customize').attr('href');
	    });
	});

function checkContext(){
	// alert("InCheckContext");

	var url = window.location.href;
	// var host = window.location.host;
	var pathName = window.location.pathname;
	/*if(pathName.indexOf('/mission_columbia_baked/users/login') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>AT THE LOGIN</B> BLEH BLAH BLAH BLAH" +  
			"BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH " + 
			"BLEH BLAH BLAH BLAH BLEH BLAH BLAH BLAH ");
		// alert("in login " + pathName);
	}*/
	/*else*/ if(pathName.indexOf(global.base_url + '/resources') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>This is a listing of all organizations' resource streams currently in the system.  Click on view/edit for more details</B>");
		// alert("in resources " +  pathName);
	}
	else if(pathName.indexOf('/mission_columbia_baked/organizations') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>This is a listing of all organizations currently in the system.  Click on view/edit for more details</B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/reports') != -1) {
		jQuery('div.tipsContent').replaceWith("<B></B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/admin') != -1) {
		jQuery('div.tipsContent').replaceWith("<B></B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/help') != -1) {
		jQuery('div.tipsContent').replaceWith("<B></B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/') != -1) {
		jQuery('div.tipsContent').replaceWith("<B></B>");
	}
	else if(pathName.indexOf('/mission_columbia_baked/users/login') != -1) {
		jQuery('div.tipsContent').replaceWith("<B>Contact your organizations for resolving login issues.</B>");
	}
	else if( url == (global.base_url + '/clients')) {
		jQuery('div.tipsContent').replaceWith("<strong>Tips for clients index</strong>");

	// 	alert("cleint search");
	}

}