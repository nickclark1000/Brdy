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
document.getElementById("up-and-downs").onclick = function(){
	$("#reportBody").children().hide();
	var string = '1';
	var percData = [];
	var ticks = [];
	$.ajax({
		type: "GET",
		url: "http://localhost:8888/Brdy/API/stats.php/UpDowns",
		success: function(upDown){
			var upDown = JSON.parse(upDown);
			var attempt = upDown.Attempts;
			var success = upDown.Successes;
			var length = Object.keys(success).length;
			
			for (i=0; i < length ; i++) {
				var category = Object.keys(attempt)[i];
				var percentage = roundToTwo(success[category]/attempt[category]*100);
				percData.push([i,percentage]);
				ticks.push([i,category]);
				$("#scrambling-data").append("<tr><td>" + category + "</td><td>" + attempt[category] + "</td></tr>");
			}
			console.log(ticks);
			$("#scrambling").show();

			console.log(percData);
			var dataset = [{ label: "Up & Downs", data: percData, color: "#5482FF" }];
			var option = {
				series: {
					bars:{
						show: true,
						fill: true
					}
				},
				bars: {
					barWidth: 0.75,
					align: 'center'
				},
				xaxis: {
					axisLabel: 'Yards',
					ticks: ticks,
					tickColor: '#f6f6f6',
					color:'black'
				},
				yaxis: {
					axisLabel: 'Percentage',
					color: 'black',
					max: 100,
					axisLabelPadding: 10,
					tickColor: '#f6f6f6',
				},
			};

			$.plot($('#updown-placeholder'),dataset,option);

		}
	});
}

$(function() {
	$( "#fromDate" ).datepicker();
	$( "#toDate" ).datepicker();
});

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

function roundToTwo(num) {
	if (isNaN(num)==true) {
		return 0;
	}
    return +(Math.round(num + "e+2")  + "e-2");
}