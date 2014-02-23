//load the courses
var courses = [];
var selectedVal = '';
/*
$('#newRoundModal').on('shown.bs.modal', function () {
    google.maps.event.trigger(map, "resize");
});
*/
$.ajax({
	type: "GET",
	url: "../API/index.php/courses",
	dataType: 'json',                       
	success: function(courseData){                    
		courses = courseData.courses;
		callback(courses);
	}
});

$.ajax({
	type: "GET",
	url: "../API/rounds.php/rounds",
	dataType: 'json',                       
	success: function(roundData){                    
		rounds = roundData.rounds;
		for(i = 0; i < rounds.length; i++) {
			$("#roundList").append("<tr><td>" + rounds[i].Date + "</td><td>" + rounds[i].CourseName + "</td></tr>");
		}
	}
});

function callback(courses) {
	var courseListLength = courses.length;
	for (i=0; i<courseListLength; i++) {
		$('#courseSelect').append('<option value="' + courses[i].CourseId + '">' + courses[i].CourseName + ', ' + courses[i].City + '</option>');
		selectedVal = $('#courseSelect').val();
	}
//	addCourseMarker(selectedVal-1);
}
 $(function() {
$( "#datepicker" ).datepicker();
});
/*
$("#courseSelect").change(function() {
	selectedVal = $("#courseSelect").val();
	var Latlng = new google.maps.LatLng(courses[selectedVal-1].Lat, courses[selectedVal-1].Lng);
	marker.setPosition(Latlng);
	map.panTo(Latlng);
});
*/


$("#newRoundBtn").click(function() {
	$.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: '../API/rounds.php/rounds',
        dataType: "json",
        data: roundDataToJSON(),
        success: function(data, textStatus, jqXHR){
        	window.location.href = "/Play/addround.php?rnd=" + data.rounds.roundId + "&crs=" + data.rounds.courseId;
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('addRound error: ' + textStatus);
        }
    });
});
/*
// Enable the visual refresh
google.maps.visualRefresh = true;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(43.667872,-79.718853),
		zoom: 15,
		mapTypeControl: false,
		panControl: false,
		zoomControl: false,
		streetViewControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
}

function addCourseMarker(id) {
	var Latlng = new google.maps.LatLng(courses[id].Lat, courses[id].Lng);
	marker = new google.maps.Marker({
		position: Latlng,
		map: map,
	});
	map.panTo(Latlng);
}
*/
// Helper function to serialize all the form fields into a JSON string
function roundDataToJSON() {
    return JSON.stringify({
		"roundId": '',    
        "userId": '1',
        "courseId": $("#courseSelect").val(),
        "roundDate": $("#datepicker").val(),
        "tournament": document.querySelector('input[name="optionsRadios"]:checked').value
        });
}

/*

google.maps.event.addDomListener(window,'load',initialize);
*/