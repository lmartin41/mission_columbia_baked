$(document).ready(function()
{
	$('#UserPassword').parent('div.required').removeClass('required');
	$('#UserPasswordConfirmation').parent('div.required').removeClass('required');
	
	var submitButton = $('.submit').find('input');
	submitButton.click(function()
	{
		$('#UserUsername').removeAttr('disabled');
	});
});