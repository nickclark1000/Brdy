document.getElementById("offTheTeeDistance").onclick = function(){
	var string = '1';
	$.ajax({
		type: "GET",
		url: "getOffTheTeeDistances.php",
		data: {'data': string},                         
		success: function(string){                    
			$("#reportBody").html(string);
		}
	});
}
document.getElementById("offTheTeeAccuracy").onclick = function(){
	var string = '1';
	$.ajax({
		type: "GET",
		url: "getOffTheTeeAccuracy.php",
		data: {'data': string},                         
		success: function(string){                    
			$("#reportBody").html(string);
		}
	});
}


