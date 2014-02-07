document.getElementById("offTheTeeDistance").onclick = function(){
	$("#reportBody").children().hide();
	var string = '1';
	$.ajax({
		type: "GET",
		url: "getOffTheTeeDistances.php",
		data: {'data': string},                         
		success: function(string){
			$("#tee-distance").show();                    
			$("#tee-distance-data").html(string);
		}
	});
}
document.getElementById("offTheTeeAccuracy").onclick = function(){
	$("#reportBody").children().hide();
	var string = '1';
	$.ajax({
		type: "GET",
		url: "getOffTheTeeAccuracy.php",
		data: {'data': string},                         
		success: function(string){    
			$("#tee-accuracy").show();                
			$("#tee-accuracy-data").html(string);
		}
	});
}
document.getElementById("select-approach-accuracy").onclick = function(){
	$("#reportBody").children().hide();
	var string = '1';
	$.ajax({
		type: "POST",
		url: "approachAccuracy.php",
		data: {'value': string},                         
		success: function(string){
			$("#approach-accuracy").show();                   
			$("#approach-accuracy-data").html(string);
			$("#filter2").prop('selectedIndex',0);
		}
	});
}
document.getElementById("approachGreenInReg").onclick = function(){
	$("#reportBody").children().hide();
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

function GIRshotFromChange() {
	var selValue = document.getElementById('filter2').value;		
	$.post('approachGreenInReg.php', {value:selValue},function(selValue){
		$('#approach-the-green-data').html(selValue);
	});
}

function accuracyShotFromChange() {
	var selValue = document.getElementById('accuracy-filter2').value;		
	$.post('approachAccuracy.php', {value:selValue},function(selValue){
		$('#approach-accuracy-data').html(selValue);
	});
}

