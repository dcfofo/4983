$(function() {

	//highlight the current nav
	$("#personal-information-nav a:contains('Personal Information')").parent().addClass('active');
	$("#qualifications-nav a:contains('Qualifications')").parent().addClass('active');
	$("#add-user a:contains('Add User')").parent().addClass('active');
   	$("#delete-user a:contains('Delete User')").parent().addClass('active');
	
	if($("#add-user a:contains('Add User')").parent().hasClass('active')){
		$(".dropdown a:contains('Admin')").parent().addClass('active');
	}
	
	if($("#delete-user a:contains('Delete User')").parent().hasClass('active')){
		$(".dropdown a:contains('Admin	')").parent().addClass('active');
	}

	//make menus drop automatically
	$('ul.nav li.dropdown').hover(function() {
		$('.dropdown-menu', this).fadeIn();
	}, function() {
		$('.dropdown-menu', this).fadeOut('fast');
	});//hover


	
}); //jQuery is loaded