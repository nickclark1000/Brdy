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
document.getElementById("approachGreenInReg").onclick = function(){
	var string = '1';
	$.ajax({
		type: "POST",
		url: "approachGreenInReg.php",
		data: {'value': string},                         
		success: function(string){
			$("#approach-the-green").show();                   
			$("#approach-the-green-data").html(string);
			$("#filter2").prop('selectedIndex',0);
		}
	});

}

function shotFromChange() {
	var selValue = document.getElementById('filter2').value;		
	$.post('approachGreenInReg.php', {value:selValue},function(selValue){
		$('#approach-the-green-data').html(selValue);
	});
}

