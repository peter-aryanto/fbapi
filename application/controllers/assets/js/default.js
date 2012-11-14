$(document).ready(function(){
 	//alert('Hi Peter');

	$('#adminAccess').click(adminAccess);
	$('#name').blur(checkName);
	$('#email').blur(checkEmail);
	$('#register').click(checkInput);
});

function adminAccess(event) {
	alert('Admin page is still under construction');
	event.preventDefault(); 	
}

function checkName()
{
	var isValid = false;
	if($('#name').val().replace(/\s*/,'') == '') $('#nameStatus').addClass('error').html('Invalid name').fadeIn('slow');
	else { $('#nameStatus').removeClass('error').html('').fadeOut('slow'); isValid = true; }
	return isValid;
}

function checkEmail()
{
	var isValid = false;
	if($('#email').val().replace(/\s*/,'') == '') $('#emailStatus').addClass('error').html('Invalid email').fadeIn('slow');
	else { $('#emailStatus').removeClass('error').html('').fadeOut('slow'); isValid = true; }
	return isValid;
}

function checkInput(event)
{
	if(!checkName() || !checkEmail()) event.preventDefault();
}