$(document).ready(function () {


//define bunker shot variables	
var bunkerTotal=0;
var bunker1count=0;
var bunker2count=0;
var bunker3count=0;
var bunker4count=0;
var bunker5count=0;
var bunker6count=0;
var bunker7count=0;
var bunker8count=0;
var bunker9count=0;
var bunker10count=0;

//add up the score for each bunker shot
$("#bunker1").change(function() {
	bunker1count = $("#bunker1").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});
	
$("#bunker2").change(function() {
	bunker2count = $("#bunker2").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker3").change(function() {
	bunker3count = $("#bunker3").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker4").change(function() {
	bunker4count = $("#bunker4").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker5").change(function() {
	bunker5count = $("#bunker5").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker6").change(function() {
	bunker6count = $("#bunker6").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker7").change(function() {
	bunker7count = $("#bunker7").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker8").change(function() {
	bunker8count = $("#bunker8").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker9").change(function() {
	bunker9count = $("#bunker9").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

$("#bunker10").change(function() {
	bunker10count = $("#bunker10").val();
	bunkerTotal = parseInt(bunker1count) + parseInt(bunker2count) + parseInt(bunker3count) + parseInt(bunker4count) + parseInt(bunker5count) + parseInt(bunker6count) + parseInt(bunker7count) + parseInt(bunker8count) + parseInt(bunker9count) + parseInt(bunker10count);
	$("#bunkerpts").html(bunkerTotal);
});

//submit the total score and details of results
$("#bunkerSubmit").click(function() {
	if(bunker1count == '' || bunker2count == '' || bunker3count == '' || bunker4count == '' || bunker5count == '' || bunker6count == '' || bunker7count == '' || bunker8count == '' || bunker9count == '' || bunker10count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var bunkerData = {
			bunker1:	bunker1count,
			bunker2:	bunker2count,
			bunker3:	bunker3count,
			bunker4:	bunker4count,
			bunker5:	bunker5count,
			bunker6:	bunker6count,
			bunker7:	bunker7count,
			bunker8:	bunker8count,
			bunker9:	bunker9count,
			bunker10:	bunker10count,
			bunkertotalscore: bunkerTotal
		};
		$.post("../testresults.php", bunkerData)		
	}
});


//define wedge shot variables	
var wedgeTotal=0;
var wedge1count=0;
var wedge2count=0;
var wedge3count=0;
var wedge4count=0;
var wedge5count=0;
var wedge6count=0;
var wedge7count=0;
var wedge8count=0;
var wedge9count=0;
var wedge10count=0;

//add up the score for each wedge shot
$("#wedge1").change(function() {
	wedge1count = $("#wedge1").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});
	
$("#wedge2").change(function() {
	wedge2count = $("#wedge2").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge3").change(function() {
	wedge3count = $("#wedge3").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge4").change(function() {
	wedge4count = $("#wedge4").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge5").change(function() {
	wedge5count = $("#wedge5").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge6").change(function() {
	wedge6count = $("#wedge6").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge7").change(function() {
	wedge7count = $("#wedge7").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge8").change(function() {
	wedge8count = $("#wedge8").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge9").change(function() {
	wedge9count = $("#wedge9").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

$("#wedge10").change(function() {
	wedge10count = $("#wedge10").val();
	wedgeTotal = parseInt(wedge1count) + parseInt(wedge2count) + parseInt(wedge3count) + parseInt(wedge4count) + parseInt(wedge5count) + parseInt(wedge6count) + parseInt(wedge7count) + parseInt(wedge8count) + parseInt(wedge9count) + parseInt(wedge10count);
	$("#wedgepts").html(wedgeTotal);
});

//submit the total score and details of results
$("#wedgeSubmit").click(function() {
	if(wedge1count == '' || wedge2count == '' || wedge3count == '' || wedge4count == '' || wedge5count == '' || wedge6count == '' || wedge7count == '' || wedge8count == '' || wedge9count == '' || wedge10count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var wedgeData = {
			wedge1:	wedge1count,
			wedge2:	wedge2count,
			wedge3:	wedge3count,
			wedge4:	wedge4count,
			wedge5:	wedge5count,
			wedge6:	wedge6count,
			wedge7:	wedge7count,
			wedge8:	wedge8count,
			wedge9:	wedge9count,
			wedge10:	wedge10count,
			wedgetotalscore: wedgeTotal
		};
		$.post("../testresults.php", wedgeData)	
	
	}
});

//define chip shot variables	
var chipTotal=0;
var chip1count=0;
var chip2count=0;
var chip3count=0;
var chip4count=0;
var chip5count=0;
var chip6count=0;
var chip7count=0;
var chip8count=0;
var chip9count=0;
var chip10count=0;

//add up the score for each chip shot
$("#chip1").change(function() {
	chip1count = $("#chip1").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});
	
$("#chip2").change(function() {
	chip2count = $("#chip2").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip3").change(function() {
	chip3count = $("#chip3").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip4").change(function() {
	chip4count = $("#chip4").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip5").change(function() {
	chip5count = $("#chip5").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip6").change(function() {
	chip6count = $("#chip6").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip7").change(function() {
	chip7count = $("#chip7").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip8").change(function() {
	chip8count = $("#chip8").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip9").change(function() {
	chip9count = $("#chip9").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

$("#chip10").change(function() {
	chip10count = $("#chip10").val();
	chipTotal = parseInt(chip1count) + parseInt(chip2count) + parseInt(chip3count) + parseInt(chip4count) + parseInt(chip5count) + parseInt(chip6count) + parseInt(chip7count) + parseInt(chip8count) + parseInt(chip9count) + parseInt(chip10count);
	$("#chippts").html(chipTotal);
});

//submit the total score and details of results
$("#chipSubmit").click(function() {
	if(chip1count == '' || chip2count == '' || chip3count == '' || chip4count == '' || chip5count == '' || chip6count == '' || chip7count == '' || chip8count == '' || chip9count == '' || chip10count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var chipData = {
			chip1:	chip1count,
			chip2:	chip2count,
			chip3:	chip3count,
			chip4:	chip4count,
			chip5:	chip5count,
			chip6:	chip6count,
			chip7:	chip7count,
			chip8:	chip8count,
			chip9:	chip9count,
			chip10:	chip10count,
			chiptotalscore: chipTotal
		};
		$.post("../testresults.php", chipData)	
	
	}
});

//define pitch shot variables	
var pitchTotal=0;
var pitch1count=0;
var pitch2count=0;
var pitch3count=0;
var pitch4count=0;
var pitch5count=0;
var pitch6count=0;
var pitch7count=0;
var pitch8count=0;
var pitch9count=0;
var pitch10count=0;

//add up the score for each pitch shot
$("#pitch1").change(function() {
	pitch1count = $("#pitch1").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});
	
$("#pitch2").change(function() {
	pitch2count = $("#pitch2").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch3").change(function() {
	pitch3count = $("#pitch3").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch4").change(function() {
	pitch4count = $("#pitch4").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch5").change(function() {
	pitch5count = $("#pitch5").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch6").change(function() {
	pitch6count = $("#pitch6").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch7").change(function() {
	pitch7count = $("#pitch7").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch8").change(function() {
	pitch8count = $("#pitch8").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch9").change(function() {
	pitch9count = $("#pitch9").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

$("#pitch10").change(function() {
	pitch10count = $("#pitch10").val();
	pitchTotal = parseInt(pitch1count) + parseInt(pitch2count) + parseInt(pitch3count) + parseInt(pitch4count) + parseInt(pitch5count) + parseInt(pitch6count) + parseInt(pitch7count) + parseInt(pitch8count) + parseInt(pitch9count) + parseInt(pitch10count);
	$("#pitchpts").html(pitchTotal);
});

//submit the total score and details of results
$("#pitchSubmit").click(function() {
	if(pitch1count == '' || pitch2count == '' || pitch3count == '' || pitch4count == '' || pitch5count == '' || pitch6count == '' || pitch7count == '' || pitch8count == '' || pitch9count == '' || pitch10count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var pitchData = {
			pitch1:	pitch1count,
			pitch2:	pitch2count,
			pitch3:	pitch3count,
			pitch4:	pitch4count,
			pitch5:	pitch5count,
			pitch6:	pitch6count,
			pitch7:	pitch7count,
			pitch8:	pitch8count,
			pitch9:	pitch9count,
			pitch10:	pitch10count,
			pitchtotalscore: pitchTotal
		};
		$.post("../testresults.php", pitchData)		
	}
});


//define longputt shot variables	
var longputtTotal=0;
var longputt1count=0;
var longputt2count=0;
var longputt3count=0;
var longputt4count=0;
var longputt5count=0;
var longputt6count=0;
var longputt7count=0;
var longputt8count=0;
var longputt9count=0;
var longputt10count=0;

//add up the score for each longputt shot
$("#longputt1").change(function() {
	longputt1count = $("#longputt1").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});
	
$("#longputt2").change(function() {
	longputt2count = $("#longputt2").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt3").change(function() {
	longputt3count = $("#longputt3").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt4").change(function() {
	longputt4count = $("#longputt4").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt5").change(function() {
	longputt5count = $("#longputt5").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt6").change(function() {
	longputt6count = $("#longputt6").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt7").change(function() {
	longputt7count = $("#longputt7").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt8").change(function() {
	longputt8count = $("#longputt8").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt9").change(function() {
	longputt9count = $("#longputt9").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

$("#longputt10").change(function() {
	longputt10count = $("#longputt10").val();
	longputtTotal = parseInt(longputt1count) + parseInt(longputt2count) + parseInt(longputt3count) + parseInt(longputt4count) + parseInt(longputt5count) + parseInt(longputt6count) + parseInt(longputt7count) + parseInt(longputt8count) + parseInt(longputt9count) + parseInt(longputt10count);
	$("#longputtpts").html(longputtTotal);
});

//submit the total score and details of results
$("#longputtSubmit").click(function() {
	if(longputt1count == '' || longputt2count == '' || longputt3count == '' || longputt4count == '' || longputt5count == '' || longputt6count == '' || longputt7count == '' || longputt8count == '' || longputt9count == '' || longputt10count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var longputtData = {
			longputt1:	longputt1count,
			longputt2:	longputt2count,
			longputt3:	longputt3count,
			longputt4:	longputt4count,
			longputt5:	longputt5count,
			longputt6:	longputt6count,
			longputt7:	longputt7count,
			longputt8:	longputt8count,
			longputt9:	longputt9count,
			longputt10:	longputt10count,
			longputttotalscore: longputtTotal
		};
		$.post("../testresults.php", longputtData)		
	}
});


//define shortputt shot variables	
var shortputtTotal=0;
var shortputt1count=0;
var shortputt2count=0;
var shortputt3count=0;
var shortputt4count=0;
var shortputt5count=0;
var shortputt6count=0;
var shortputt7count=0;
var shortputt8count=0;
var shortputt9count=0;
var shortputt10count=0;
var shortputt11count=0;
var shortputt12count=0;
var shortputt13count=0;
var shortputt14count=0;
var shortputt15count=0;
var shortputt16count=0;
var shortputt17count=0;
var shortputt18count=0;
var shortputt19count=0;
var shortputt20count=0;

//add up the score for each shortputt shot
$("#shortputt1").change(function() {
	shortputt1count = $("#shortputt1").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});
	
$("#shortputt2").change(function() {
	shortputt2count = $("#shortputt2").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt3").change(function() {
	shortputt3count = $("#shortputt3").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt4").change(function() {
	shortputt4count = $("#shortputt4").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt5").change(function() {
	shortputt5count = $("#shortputt5").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt6").change(function() {
	shortputt6count = $("#shortputt6").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt7").change(function() {
	shortputt7count = $("#shortputt7").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt8").change(function() {
	shortputt8count = $("#shortputt8").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt9").change(function() {
	shortputt9count = $("#shortputt9").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt10").change(function() {
	shortputt10count = $("#shortputt10").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	LRTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count);
	$("#LRputtpts").html(LRTotal);
});

$("#shortputt11").change(function() {
	shortputt11count = $("#shortputt11").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});
	
$("#shortputt12").change(function() {
	shortputt12count = $("#shortputt12").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt13").change(function() {
	shortputt13count = $("#shortputt13").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt14").change(function() {
	shortputt14count = $("#shortputt14").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt15").change(function() {
	shortputt15count = $("#shortputt15").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt16").change(function() {
	shortputt16count = $("#shortputt16").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt17").change(function() {
	shortputt17count = $("#shortputt17").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt18").change(function() {
	shortputt18count = $("#shortputt18").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt19").change(function() {
	shortputt19count = $("#shortputt19").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

$("#shortputt20").change(function() {
	shortputt20count = $("#shortputt20").val();
	shortputtTotal = parseInt(shortputt1count) + parseInt(shortputt2count) + parseInt(shortputt3count) + parseInt(shortputt4count) + parseInt(shortputt5count) + parseInt(shortputt6count) + parseInt(shortputt7count) + parseInt(shortputt8count) + parseInt(shortputt9count) + parseInt(shortputt10count)+
	parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#shortputtpts").html(shortputtTotal);
	
	RLTotal = parseInt(shortputt11count) + parseInt(shortputt12count) + parseInt(shortputt13count) + parseInt(shortputt14count) + parseInt(shortputt15count) + parseInt(shortputt16count) + parseInt(shortputt17count) + parseInt(shortputt18count) + parseInt(shortputt19count) + parseInt(shortputt20count);
	$("#RLputtpts").html(RLTotal);
});

//submit the total score and details of results
$("#shortputtSubmit").click(function() {
	if(shortputt1count == '' || shortputt2count == '' || shortputt3count == '' || shortputt4count == '' || shortputt5count == '' || shortputt6count == '' || shortputt7count == '' || shortputt8count == '' || shortputt9count == '' || shortputt10count == '' || shortputt11count == '' || shortputt12count == '' || shortputt13count == '' || shortputt14count == '' || shortputt15count == '' || shortputt16count == '' || shortputt17count == '' || shortputt18count == '' || shortputt19count == '' || shortputt20count == ''){
		alert("Please enter a score for each shot");
	}

	else {
		var shortputtData = {
			shortputt1:	shortputt1count,
			shortputt2:	shortputt2count,
			shortputt3:	shortputt3count,
			shortputt4:	shortputt4count,
			shortputt5:	shortputt5count,
			shortputt6:	shortputt6count,
			shortputt7:	shortputt7count,
			shortputt8:	shortputt8count,
			shortputt9:	shortputt9count,
			shortputt10:	shortputt10count,
			shortputt11:	shortputt11count,
			shortputt12:	shortputt12count,
			shortputt13:	shortputt13count,
			shortputt14:	shortputt14count,
			shortputt15:	shortputt15count,
			shortputt16:	shortputt16count,
			shortputt17:	shortputt17count,
			shortputt18:	shortputt18count,
			shortputt19:	shortputt19count,
			shortputt20:	shortputt20count,
			LRTotal: LRTotal,
			RLTotal: RLTotal
		};
		$.post("../shortputtresults.php", shortputtData)
		
	}
});

$('#shotType').change(function() {
   $('#summarycontents').load('shortgame.php?shotType='+this.options[this.selectedIndex].value);
});

//submit the total score and details of results
$("#testSubmit").click(function(){
	if(shortputt1count == '' || shortputt2count == '' || shortputt3count == '' || shortputt4count == '' || shortputt5count == '' || shortputt6count == '' || shortputt7count == '' || shortputt8count == '' || shortputt9count == '' || shortputt10count == '' || shortputt11count == '' || shortputt12count == '' || shortputt13count == '' || shortputt14count == '' || shortputt15count == '' || shortputt16count == '' || shortputt17count == '' || shortputt18count == '' || shortputt19count == '' || shortputt20count == ''){
		alert("You haven't completed the Putting Skills test yet!");
	}
	else if(longputt1count == '' || longputt2count == '' || longputt3count == '' || longputt4count == '' || longputt5count == '' || longputt6count == '' || longputt7count == '' || longputt8count == '' || longputt9count == '' || longputt10count == ''){
		alert("You haven't completed the Lag Putting test yet!");
	}
	else if(pitch1count == '' || pitch2count == '' || pitch3count == '' || pitch4count == '' || pitch5count == '' || pitch6count == '' || pitch7count == '' || pitch8count == '' || pitch9count == '' || pitch10count == ''){
		alert("You haven't completed the Pitch Shot test yet!");
	}
	else if(chip1count == '' || chip2count == '' || chip3count == '' || chip4count == '' || chip5count == '' || chip6count == '' || chip7count == '' || chip8count == '' || chip9count == '' || chip10count == ''){
		alert("You haven't completed the Chip Shot test yet!");
	}
	else if(wedge1count == '' || wedge2count == '' || wedge3count == '' || wedge4count == '' || wedge5count == '' || wedge6count == '' || wedge7count == '' || wedge8count == '' || wedge9count == '' || wedge10count == ''){
		alert("You haven't completed the Wedge Shot test yet!");
	}
	else if(bunker1count == '' || bunker2count == '' || bunker3count == '' || bunker4count == '' || bunker5count == '' || bunker6count == '' || bunker7count == '' || bunker8count == '' || bunker9count == '' || bunker10count == ''){
		alert("You haven't completed the Bunker Shot test yet!");
	}
	else {	

		var testData = {
			chip1:	chip1count,
			chip2:	chip2count,
			chip3:	chip3count,
			chip4:	chip4count,
			chip5:	chip5count,
			chip6:	chip6count,
			chip7:	chip7count,
			chip8:	chip8count,
			chip9:	chip9count,
			chip10:	chip10count,
			chiptotalscore: chipTotal,
			wedge1:	wedge1count,
			wedge2:	wedge2count,
			wedge3:	wedge3count,
			wedge4:	wedge4count,
			wedge5:	wedge5count,
			wedge6:	wedge6count,
			wedge7:	wedge7count,
			wedge8:	wedge8count,
			wedge9:	wedge9count,
			wedge10:	wedge10count,
			wedgetotalscore: wedgeTotal,
			pitch1:	pitch1count,
			pitch2:	pitch2count,
			pitch3:	pitch3count,
			pitch4:	pitch4count,
			pitch5:	pitch5count,
			pitch6:	pitch6count,
			pitch7:	pitch7count,
			pitch8:	pitch8count,
			pitch9:	pitch9count,
			pitch10:	pitch10count,
			pitchtotalscore: pitchTotal,
			longputt1:	longputt1count,
			longputt2:	longputt2count,
			longputt3:	longputt3count,
			longputt4:	longputt4count,
			longputt5:	longputt5count,
			longputt6:	longputt6count,
			longputt7:	longputt7count,
			longputt8:	longputt8count,
			longputt9:	longputt9count,
			longputt10:	longputt10count,
			longputttotalscore: longputtTotal,
			shortputt1:	shortputt1count,
			shortputt2:	shortputt2count,
			shortputt3:	shortputt3count,
			shortputt4:	shortputt4count,
			shortputt5:	shortputt5count,
			shortputt6:	shortputt6count,
			shortputt7:	shortputt7count,
			shortputt8:	shortputt8count,
			shortputt9:	shortputt9count,
			shortputt10:	shortputt10count,
			shortputt11:	shortputt11count,
			shortputt12:	shortputt12count,
			shortputt13:	shortputt13count,
			shortputt14:	shortputt14count,
			shortputt15:	shortputt15count,
			shortputt16:	shortputt16count,
			shortputt17:	shortputt17count,
			shortputt18:	shortputt18count,
			shortputt19:	shortputt19count,
			shortputt20:	shortputt20count,
			LRTotal: LRTotal,
			RLTotal: RLTotal,
			bunker1:	bunker1count,
			bunker2:	bunker2count,
			bunker3:	bunker3count,
			bunker4:	bunker4count,
			bunker5:	bunker5count,
			bunker6:	bunker6count,
			bunker7:	bunker7count,
			bunker8:	bunker8count,
			bunker9:	bunker9count,
			bunker10:	bunker10count,
			bunkertotalscore: bunkerTotal
		};
		$.post("../testresults.php", testData)
	}
});

});