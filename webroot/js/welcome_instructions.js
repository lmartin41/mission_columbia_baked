$(document).ready(function()
{
		setTimeout('load()', 2000);
});

function createCookieAndLogIn()
{
	$.cookie('followedInstructions', true, {'expires': 365});
	document.location = global.base_url + "/users/login";
}

function cookieExists()
{		
	if( $.cookie('followedInstructions') == 'true' )
	{
		return true;
	}

	return false;
}

function load()
{
	if( cookieExists() )
	{
		//reset cookie
		$.cookie('followedInstructions', true, {'expires': 365});

		//redirect
		document.location = global.base_url + "/users/login";
	} 
	else
	{
		$('#loading').addClass('do_not_show');
		$('#instructions').removeClass('do_not_show');
		$("#browser").accordion({heightStyle: "content"});
		$("#os").accordion({heightStyle: "content"});
	}
}

function clickWindow(win)
{
	$('#' + win).click();
	document.location = global.base_url + "/#os";
}