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

$("#loginBtn").click(function() {
	var email = $("#loginEmail").val();
	var password = $("#loginPassword").val();

	$.post("../register.php", {loginEmail: email, loginPassword: password})
});

