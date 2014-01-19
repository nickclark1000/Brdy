$(document).ready(function () {

//define bunker shot variables	
var bunkerTotal=0;
var bunkerChkTotal=0;
var bunkerCat1Count = 0;
var bunkerCat2Count = 0;
var bunkerCat3Count = 0;
var bunkerCat4Count = 0;
var bunkerCat5Count = 0;

//add up the score, limit the number of shots to 10, add checkmarks, show Remove button
$("#bunker1").click(function() {
	if (bunkerChkTotal < 10) {
		bunkerTotal=bunkerTotal + 3;
		bunkerChkTotal++;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#bunkerChk1").append(img);
		$("#bunkerpts").html(bunkerTotal);
		bunkerCat1Count++;
		if (bunkerCat1Count>0) {
			$("#bunkerRmv1").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

$("#bunker2").click(function() {
	if (bunkerChkTotal < 10) {
		bunkerTotal=bunkerTotal + 2;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#bunkerChk2").append(img);
		bunkerChkTotal++;
		$("#bunkerpts").html(bunkerTotal);
		bunkerCat2Count++;
		if (bunkerCat2Count>0) {
			$("#bunkerRmv2").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});
	
$("#bunker3").click(function() {
	if (bunkerChkTotal < 10) {
		bunkerTotal=bunkerTotal + 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#bunkerChk3").append(img);
		bunkerChkTotal++;
		$("#bunkerpts").html(bunkerTotal);
		bunkerCat3Count++;
		if (bunkerCat3Count>0) {
			$("#bunkerRmv3").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#bunker4").click(function() {
	if (bunkerChkTotal < 10) {
		bunkerTotal=bunkerTotal + 0;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#bunkerChk4").append(img);
		bunkerChkTotal++;
		$("#bunkerpts").html(bunkerTotal);
		bunkerCat4Count++;
		if (bunkerCat4Count>0) {
			$("#bunkerRmv4").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#bunker5").click(function() {
	if (bunkerChkTotal < 10) {
		bunkerTotal=bunkerTotal - 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#bunkerChk5").append(img);
		bunkerChkTotal++;
		$("#bunkerpts").html(bunkerTotal);
		bunkerCat5Count++;
		if (bunkerCat5Count>0) {
			$("#bunkerRmv5").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

//Remove checkmarks, update total score and checkmark count
$("#bunkerRmv1").click(function() {
	bunkerTotal=bunkerTotal - 3;
	$("#bunkerpts").html(bunkerTotal);
	bunkerCat1Count--;
	bunkerChkTotal--;
	$("#bunkerChk1").find("img:last").remove();
	if (bunkerCat1Count==0) {
		$("#bunkerRmv1").hide();
	}
});

$("#bunkerRmv2").click(function() {
	bunkerTotal=bunkerTotal - 2;
	$("#bunkerpts").html(bunkerTotal);
	bunkerCat2Count--;
	bunkerChkTotal--;
	$("#bunkerChk2").find("img:last").remove();
	if (bunkerCat2Count==0) {
		$("#bunkerRmv2").hide();
	}
});

$("#bunkerRmv3").click(function() {
	bunkerTotal=bunkerTotal - 1;
	$("#bunkerpts").html(bunkerTotal);
	bunkerCat3Count--;
	bunkerChkTotal--;
	$("#bunkerChk3").find("img:last").remove();
	if (bunkerCat3Count==0) {
		$("#bunkerRmv3").hide();
	}
});

$("#bunkerRmv4").click(function() {
	bunkerTotal=bunkerTotal - 0;
	$("#bunkerpts").html(bunkerTotal);
	bunkerCat4Count--;
	bunkerChkTotal--;
	$("#bunkerChk4").find("img:last").remove();
	if (bunkerCat4Count==0) {
		$("#bunkerRmv4").hide();
	}
});

$("#bunkerRmv5").click(function() {
	bunkerTotal=bunkerTotal + 1;
	$("#bunkerpts").html(bunkerTotal);
	bunkerCat5Count--;
	bunkerChkTotal--;
	$("#bunkerChk5").find("img:last").remove();
	if (bunkerCat5Count==0) {
		$("#bunkerRmv5").hide();
	}
});

//submit the total score and details of results
$("#bunkerSubmit").click(function(){
	if(bunkerChkTotal!=10) {
		alert("You haven't hit 10 shots yet!");
	}
	else {
	var bunkerData = {
		cat1count:	bunkerCat1Count,
		cat2count:	bunkerCat2Count,
		cat3count:	bunkerCat3Count,
		cat4count:	bunkerCat4Count,
		cat5count:	bunkerCat5Count,
		totalscore: bunkerTotal
	};
	$.post("../shortgame.php", bunkerData)}	
});

//define wedge shot variables	
var wedgeTotal=0;
var wedgeChkTotal=0;
var wedgeCat1Count = 0;
var wedgeCat2Count = 0;
var wedgeCat3Count = 0;
var wedgeCat4Count = 0;
var wedgeCat5Count = 0;

//add up the score, limit the number of shots to 10, add checkmarks, show Remove button
$("#wedge1").click(function() {
	if (wedgeChkTotal < 10) {
		wedgeTotal=wedgeTotal + 3;
		wedgeChkTotal++;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#wedgeChk1").append(img);
		$("#wedgepts").html(wedgeTotal);
		wedgeCat1Count++;
		if (wedgeCat1Count>0) {
			$("#wedgeRmv1").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

$("#wedge2").click(function() {
	if (wedgeChkTotal < 10) {
		wedgeTotal=wedgeTotal + 2;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#wedgeChk2").append(img);
		wedgeChkTotal++;
		$("#wedgepts").html(wedgeTotal);
		wedgeCat2Count++;
		if (wedgeCat2Count>0) {
			$("#wedgeRmv2").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});
	
$("#wedge3").click(function() {
	if (wedgeChkTotal < 10) {
		wedgeTotal=wedgeTotal + 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#wedgeChk3").append(img);
		wedgeChkTotal++;
		$("#wedgepts").html(wedgeTotal);
		wedgeCat3Count++;
		if (wedgeCat3Count>0) {
			$("#wedgeRmv3").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#wedge4").click(function() {
	if (wedgeChkTotal < 10) {
		wedgeTotal=wedgeTotal + 0;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#wedgeChk4").append(img);
		wedgeChkTotal++;
		$("#wedgepts").html(wedgeTotal);
		wedgeCat4Count++;
		if (wedgeCat4Count>0) {
			$("#wedgeRmv4").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#wedge5").click(function() {
	if (wedgeChkTotal < 10) {
		wedgeTotal=wedgeTotal - 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#wedgeChk5").append(img);
		wedgeChkTotal++;
		$("#wedgepts").html(wedgeTotal);
		wedgeCat5Count++;
		if (wedgeCat5Count>0) {
			$("#wedgeRmv5").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

//Remove checkmarks, update total score and checkmark count
$("#wedgeRmv1").click(function() {
	wedgeTotal=wedgeTotal - 3;
	$("#wedgepts").html(wedgeTotal);
	wedgeCat1Count--;
	wedgeChkTotal--;
	$("#wedgeChk1").find("img:last").remove();
	if (wedgeCat1Count==0) {
		$("#wedgeRmv1").hide();
	}
});

$("#wedgeRmv2").click(function() {
	wedgeTotal=wedgeTotal - 2;
	$("#wedgepts").html(wedgeTotal);
	wedgeCat2Count--;
	wedgeChkTotal--;
	$("#wedgeChk2").find("img:last").remove();
	if (wedgeCat2Count==0) {
		$("#wedgeRmv2").hide();
	}
});

$("#wedgeRmv3").click(function() {
	wedgeTotal=wedgeTotal - 1;
	$("#wedgepts").html(wedgeTotal);
	wedgeCat3Count--;
	wedgeChkTotal--;
	$("#wedgeChk3").find("img:last").remove();
	if (wedgeCat3Count==0) {
		$("#wedgeRmv3").hide();
	}
});

$("#wedgeRmv4").click(function() {
	wedgeTotal=wedgeTotal - 0;
	$("#wedgepts").html(wedgeTotal);
	wedgeCat4Count--;
	wedgeChkTotal--;
	$("#wedgeChk4").find("img:last").remove();
	if (wedgeCat4Count==0) {
		$("#wedgeRmv4").hide();
	}
});

$("#wedgeRmv5").click(function() {
	wedgeTotal=wedgeTotal + 1;
	$("#wedgepts").html(wedgeTotal);
	wedgeCat5Count--;
	wedgeChkTotal--;
	$("#wedgeChk5").find("img:last").remove();
	if (wedgeCat5Count==0) {
		$("#wedgeRmv5").hide();
	}
});

//submit the total score and details of results
$("#wedgeSubmit").click(function(){
	if(wedgeChkTotal!=10) {
		alert("You haven't hit 10 shots yet!");
	}
	else {
	var wedgeData = {
		cat1count:	wedgeCat1Count,
		cat2count:	wedgeCat2Count,
		cat3count:	wedgeCat3Count,
		cat4count:	wedgeCat4Count,
		cat5count:	wedgeCat5Count,
		totalscore: wedgeTotal
	};
	$.post("../shortgame.php", wedgeData)}	
});

//define chip shot variables	
var chipTotal=0;
var chipChkTotal=0;
var chipCat1Count = 0;
var chipCat2Count = 0;
var chipCat3Count = 0;
var chipCat4Count = 0;
var chipCat5Count = 0;

//add up the score, limit the number of shots to 10, add checkmarks, show Remove button
$("#chip1").click(function() {
	if (chipChkTotal < 10) {
		chipTotal=chipTotal + 3;
		chipChkTotal++;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#chipChk1").append(img);
		$("#chippts").html(chipTotal);
		chipCat1Count++;
		if (chipCat1Count>0) {
			$("#chipRmv1").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

$("#chip2").click(function() {
	if (chipChkTotal < 10) {
		chipTotal=chipTotal + 2;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#chipChk2").append(img);
		chipChkTotal++;
		$("#chippts").html(chipTotal);
		chipCat2Count++;
		if (chipCat2Count>0) {
			$("#chipRmv2").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});
	
$("#chip3").click(function() {
	if (chipChkTotal < 10) {
		chipTotal=chipTotal + 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#chipChk3").append(img);
		chipChkTotal++;
		$("#chippts").html(chipTotal);
		chipCat3Count++;
		if (chipCat3Count>0) {
			$("#chipRmv3").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#chip4").click(function() {
	if (chipChkTotal < 10) {
		chipTotal=chipTotal + 0;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#chipChk4").append(img);
		chipChkTotal++;
		$("#chippts").html(chipTotal);
		chipCat4Count++;
		if (chipCat4Count>0) {
			$("#chipRmv4").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#chip5").click(function() {
	if (chipChkTotal < 10) {
		chipTotal=chipTotal - 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#chipChk5").append(img);
		chipChkTotal++;
		$("#chippts").html(chipTotal);
		chipCat5Count++;
		if (chipCat5Count>0) {
			$("#chipRmv5").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

//Remove checkmarks, update total score and checkmark count
$("#chipRmv1").click(function() {
	chipTotal=chipTotal - 3;
	$("#chippts").html(chipTotal);
	chipCat1Count--;
	chipChkTotal--;
	$("#chipChk1").find("img:last").remove();
	if (chipCat1Count==0) {
		$("#chipRmv1").hide();
	}
});

$("#chipRmv2").click(function() {
	chipTotal=chipTotal - 2;
	$("#chippts").html(chipTotal);
	chipCat2Count--;
	chipChkTotal--;
	$("#chipChk2").find("img:last").remove();
	if (chipCat2Count==0) {
		$("#chipRmv2").hide();
	}
});

$("#chipRmv3").click(function() {
	chipTotal=chipTotal - 1;
	$("#chippts").html(chipTotal);
	chipCat3Count--;
	chipChkTotal--;
	$("#chipChk3").find("img:last").remove();
	if (chipCat3Count==0) {
		$("#chipRmv3").hide();
	}
});

$("#chipRmv4").click(function() {
	chipTotal=chipTotal - 0;
	$("#chippts").html(chipTotal);
	chipCat4Count--;
	chipChkTotal--;
	$("#chipChk4").find("img:last").remove();
	if (chipCat4Count==0) {
		$("#chipRmv4").hide();
	}
});

$("#chipRmv5").click(function() {
	chipTotal=chipTotal + 1;
	$("#chippts").html(chipTotal);
	chipCat5Count--;
	chipChkTotal--;
	$("#chipChk5").find("img:last").remove();
	if (chipCat5Count==0) {
		$("#chipRmv5").hide();
	}
});

//submit the total score and details of results
$("#chipSubmit").click(function(){
	if(chipChkTotal!=10) {
		alert("You haven't hit 10 shots yet!");
	}
	else {
	var chipData = {
		cat1count:	chipCat1Count,
		cat2count:	chipCat2Count,
		cat3count:	chipCat3Count,
		cat4count:	chipCat4Count,
		cat5count:	chipCat5Count,
		totalscore: chipTotal
	};
	$.post("../shortgame.php", chipData)}	
});

//define pitch shot variables	
var pitchTotal=0;
var pitchChkTotal=0;
var pitchCat1Count = 0;
var pitchCat2Count = 0;
var pitchCat3Count = 0;
var pitchCat4Count = 0;
var pitchCat5Count = 0;

//add up the score, limit the number of shots to 10, add checkmarks, show Remove button
$("#pitch1").click(function() {
	if (pitchChkTotal < 10) {
		pitchTotal=pitchTotal + 3;
		pitchChkTotal++;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#pitchChk1").append(img);
		$("#pitchpts").html(pitchTotal);
		pitchCat1Count++;
		if (pitchCat1Count>0) {
			$("#pitchRmv1").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

$("#pitch2").click(function() {
	if (pitchChkTotal < 10) {
		pitchTotal=pitchTotal + 2;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#pitchChk2").append(img);
		pitchChkTotal++;
		$("#pitchpts").html(pitchTotal);
		pitchCat2Count++;
		if (pitchCat2Count>0) {
			$("#pitchRmv2").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});
	
$("#pitch3").click(function() {
	if (pitchChkTotal < 10) {
		pitchTotal=pitchTotal + 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#pitchChk3").append(img);
		pitchChkTotal++;
		$("#pitchpts").html(pitchTotal);
		pitchCat3Count++;
		if (pitchCat3Count>0) {
			$("#pitchRmv3").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#pitch4").click(function() {
	if (pitchChkTotal < 10) {
		pitchTotal=pitchTotal + 0;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#pitchChk4").append(img);
		pitchChkTotal++;
		$("#pitchpts").html(pitchTotal);
		pitchCat4Count++;
		if (pitchCat4Count>0) {
			$("#pitchRmv4").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#pitch5").click(function() {
	if (pitchChkTotal < 10) {
		pitchTotal=pitchTotal - 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#pitchChk5").append(img);
		pitchChkTotal++;
		$("#pitchpts").html(pitchTotal);
		pitchCat5Count++;
		if (pitchCat5Count>0) {
			$("#pitchRmv5").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

//Remove checkmarks, update total score and checkmark count
$("#pitchRmv1").click(function() {
	pitchTotal=pitchTotal - 3;
	$("#pitchpts").html(pitchTotal);
	pitchCat1Count--;
	pitchChkTotal--;
	$("#pitchChk1").find("img:last").remove();
	if (pitchCat1Count==0) {
		$("#pitchRmv1").hide();
	}
});

$("#pitchRmv2").click(function() {
	pitchTotal=pitchTotal - 2;
	$("#pitchpts").html(pitchTotal);
	pitchCat2Count--;
	pitchChkTotal--;
	$("#pitchChk2").find("img:last").remove();
	if (pitchCat2Count==0) {
		$("#pitchRmv2").hide();
	}
});

$("#pitchRmv3").click(function() {
	pitchTotal=pitchTotal - 1;
	$("#pitchpts").html(pitchTotal);
	pitchCat3Count--;
	pitchChkTotal--;
	$("#pitchChk3").find("img:last").remove();
	if (pitchCat3Count==0) {
		$("#pitchRmv3").hide();
	}
});

$("#pitchRmv4").click(function() {
	pitchTotal=pitchTotal - 0;
	$("#pitchpts").html(pitchTotal);
	pitchCat4Count--;
	pitchChkTotal--;
	$("#pitchChk4").find("img:last").remove();
	if (pitchCat4Count==0) {
		$("#pitchRmv4").hide();
	}
});

$("#pitchRmv5").click(function() {
	pitchTotal=pitchTotal + 1;
	$("#pitchpts").html(pitchTotal);
	pitchCat5Count--;
	pitchChkTotal--;
	$("#pitchChk5").find("img:last").remove();
	if (pitchCat5Count==0) {
		$("#pitchRmv5").hide();
	}
});

//submit the total score and details of results
$("#pitchSubmit").click(function(){
	if(pitchChkTotal!=10) {
		alert("You haven't hit 10 shots yet!");
	}
	else {
	var pitchData = {
		cat1count:	pitchCat1Count,
		cat2count:	pitchCat2Count,
		cat3count:	pitchCat3Count,
		cat4count:	pitchCat4Count,
		cat5count:	pitchCat5Count,
		totalscore: pitchTotal
	};
	$.post("../shortgame.php", pitchData)}	
});

//define longputt shot variables	
var longputtTotal=0;
var longputtChkTotal=0;
var longputtCat1Count = 0;
var longputtCat2Count = 0;
var longputtCat3Count = 0;
var longputtCat4Count = 0;
var longputtCat5Count = 0;

//add up the score, limit the number of shots to 10, add checkmarks, show Remove button
$("#longputt1").click(function() {
	if (longputtChkTotal < 10) {
		longputtTotal=longputtTotal + 3;
		longputtChkTotal++;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#longputtChk1").append(img);
		$("#longputtpts").html(longputtTotal);
		longputtCat1Count++;
		if (longputtCat1Count>0) {
			$("#longputtRmv1").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

$("#longputt2").click(function() {
	if (longputtChkTotal < 10) {
		longputtTotal=longputtTotal + 2;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#longputtChk2").append(img);
		longputtChkTotal++;
		$("#longputtpts").html(longputtTotal);
		longputtCat2Count++;
		if (longputtCat2Count>0) {
			$("#longputtRmv2").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});
	
$("#longputt3").click(function() {
	if (longputtChkTotal < 10) {
		longputtTotal=longputtTotal + 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#longputtChk3").append(img);
		longputtChkTotal++;
		$("#longputtpts").html(longputtTotal);
		longputtCat3Count++;
		if (longputtCat3Count>0) {
			$("#longputtRmv3").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#longputt4").click(function() {
	if (longputtChkTotal < 10) {
		longputtTotal=longputtTotal + 0;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#longputtChk4").append(img);
		longputtChkTotal++;
		$("#longputtpts").html(longputtTotal);
		longputtCat4Count++;
		if (longputtCat4Count>0) {
			$("#longputtRmv4").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}	
});
	
$("#longputt5").click(function() {
	if (longputtChkTotal < 10) {
		longputtTotal=longputtTotal - 1;
		var img = document.createElement("img");
		img.src = "../img/checkmark.png";
		$("#longputtChk5").append(img);
		longputtChkTotal++;
		$("#longputtpts").html(longputtTotal);
		longputtCat5Count++;
		if (longputtCat5Count>0) {
			$("#longputtRmv5").show();
			}
	}
	else {
		alert("You've already hit 10 shots!");	
	}
});

//Remove checkmarks, update total score and checkmark count
$("#longputtRmv1").click(function() {
	longputtTotal=longputtTotal - 3;
	$("#longputtpts").html(longputtTotal);
	longputtCat1Count--;
	longputtChkTotal--;
	$("#longputtChk1").find("img:last").remove();
	if (longputtCat1Count==0) {
		$("#longputtRmv1").hide();
	}
});

$("#longputtRmv2").click(function() {
	longputtTotal=longputtTotal - 2;
	$("#longputtpts").html(longputtTotal);
	longputtCat2Count--;
	longputtChkTotal--;
	$("#longputtChk2").find("img:last").remove();
	if (longputtCat2Count==0) {
		$("#longputtRmv2").hide();
	}
});

$("#longputtRmv3").click(function() {
	longputtTotal=longputtTotal - 1;
	$("#longputtpts").html(longputtTotal);
	longputtCat3Count--;
	longputtChkTotal--;
	$("#longputtChk3").find("img:last").remove();
	if (longputtCat3Count==0) {
		$("#longputtRmv3").hide();
	}
});

$("#longputtRmv4").click(function() {
	longputtTotal=longputtTotal - 0;
	$("#longputtpts").html(longputtTotal);
	longputtCat4Count--;
	longputtChkTotal--;
	$("#longputtChk4").find("img:last").remove();
	if (longputtCat4Count==0) {
		$("#longputtRmv4").hide();
	}
});

$("#longputtRmv5").click(function() {
	longputtTotal=longputtTotal + 1;
	$("#longputtpts").html(longputtTotal);
	longputtCat5Count--;
	longputtChkTotal--;
	$("#longputtChk5").find("img:last").remove();
	if (longputtCat5Count==0) {
		$("#longputtRmv5").hide();
	}
});

//submit the total score and details of results
$("#longputtSubmit").click(function(){
	if(longputtChkTotal!=10) {
		alert("You haven't hit 10 shots yet!");
	}
	else {
	var longputtData = {
		cat1count:	longputtCat1Count,
		cat2count:	longputtCat2Count,
		cat3count:	longputtCat3Count,
		cat4count:	longputtCat4Count,
		cat5count:	longputtCat5Count,
		totalscore: longputtTotal
	};
	$.post("../shortgame.php", longputtData)}	
});

//define shortputt shot variables	
var shortputtTotal=0;
var shortputtLRcount=0;
var shortputtRLcount=0;


//add up the score for each short putt category
$("#LRputts").change(function() {
	shortputtLRcount = $("#LRputts").val();
	shortputtTotal = 2*(parseInt(shortputtLRcount) + parseInt(shortputtRLcount));
	$("#shortputtpts").html(shortputtTotal);
	});
	
$("#RLputts").change(function() {
	shortputtRLcount = $("#RLputts").val();
	shortputtTotal = 2*(parseInt(shortputtLRcount) + parseInt(shortputtRLcount));
	$("#shortputtpts").html(shortputtTotal);
	});
	
//submit the total score and details of results
$("#shortputtSubmit").click(function() {
	if(shortputtLRcount == ''){
		alert("Please enter how many left-to-right putts were holed");
	}
	
	else if(shortputtRLcount == '')	{
		alert("Please enter how many right-to-left putts were holed");
	}
	else {
		var shortputtData = {
			LRcount:	shortputtLRcount,
			RLcount:	shortputtRLcount,
			totalscore: shortputtTotal
		};
		$.post("../shortputtresults.php", shortputtData)
	}
});

//submit the total score and details of results
$("#testSubmit").click(function(){
	if(shortputtChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	if(longputtChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	if(bunkerChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	if(chipChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	if(pitchChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	if(wedgeChkTotal!=10) {
		alert("You haven't completed the Putting Skills test yet!");
	}
	else {
	var testTotal = shortputtTotal+longputtTotal+bunkerTotal+chipTotal+pitchTotal+wedgeTotal;
	$.post("../shortgame.php", testTotal)}	
});


});