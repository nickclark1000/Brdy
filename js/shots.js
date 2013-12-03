//on page load, get the hole attributes and list them in the table
document.getElementById("offTheTeeDistance").onclick = function(){
	var string = '1';
	$.ajax({
		type: "GET",
		url: "../getOffTheTeeDistances.php",
		data: {'data': string},                         
		success: function(string){                    
			$("#reportBody").html(string);
		}
	});
}