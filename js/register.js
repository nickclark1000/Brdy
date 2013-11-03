$(document).ready(function () {

$("#registeruser").click(function() {
	var userfirstname = $("#firstname").val();
	var userlastname = $("#lastname").val();
	var useremail = $("#email").val();
	var userpassword = $("#password").val();
	var registrationData = {
		firstname: userfirstname,
		lastname: userlastname,
		email: useremail,
		password: userpassword	
	};
	$.post("../register.php", registrationData)
});

});