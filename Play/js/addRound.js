var map;
var path = [];
var numShots;
var shots = [];
var markers = [];
var poly = [];
var holes = [];
activeHole = 1;
var prevMarkerPosition;
var features = {};
greenHit = false;
var holeFeatures = [];
var pinLocation;
thisHole = {};
userId = 1;
clubs = {};

var url = $.url();
var courseId = url.param('crs');
var roundId = url.param('rnd');

//load the features for every hole on page load
$.ajax({
	type: "POST",
	url: "getHoleFeatures.php",
	data: {'courseId': courseId},                        
	success: function(holeFeatures){                    
		features = JSON.parse(holeFeatures);
		holePin = getHoleFeatures(1,'pinlocation');
		yardage = getHoleFeatures(1,'yardage');
	}
});

$.post("getUserClubs.php", {id:userId},function(data){
	clubs["data"] = data;
});

// Enable the visual refresh
google.maps.visualRefresh = true;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(43.667872,-79.718853),
		zoom: 18,
		mapTypeControl: false,
		panControl: false,
		zoomControl: false,
		streetViewControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
	
	//define the initial parameters for each hole
	for(i=0; i<18; i++) {
		thisHole = {};
		var polyOptions = {
			strokeColor: '#000000',
			strokeOpacity: 0.4,
			strokeWeight: 3
		};
		thisHole["doneHole"] = false;
		thisHole["numShots"] = 0;
		thisHole["markers"] = [];
		thisHole["poly"] = new google.maps.Polyline(polyOptions);
		thisHole["shots"] = [];
		holes.push(thisHole);
	}
	
	holePin.setMap(map);
	activeHole = 1;
	par = getHoleFeatures(activeHole,'par');

	holes[0].poly.setMap(map);
 	// Add a listener for the map click event
 	google.maps.event.addListener(map, 'click', addLatLng);
 	google.maps.event.addListener(holePin, 'click', lastShotClick);
}
/**
 * Handles click events on a map, and adds a new point to the Polyline.
 * @param {google.maps.MouseEvent} event
 */
function addLatLng(event) {
	arrayHole = activeHole -1;
	if(holes[arrayHole].doneHole == false){
		markers = holes[arrayHole].markers;
		shots = holes[arrayHole].shots;
		poly = holes[arrayHole].poly;
		path = poly.getPath();
		thisShot = {};
		thisHole = {};
		// Because path is an MVCArray, we can simply append a new coordinate
		// and it will automatically appear.
		path.push(event.latLng);
		holes[arrayHole].numShots = path.getLength();
		numShots = holes[arrayHole].numShots;
		
		pinLocation = holePin.position;

		// Add a new marker at the new plotted point on the polyline and then add to the markers array
		var marker = new google.maps.Marker({
			position: event.latLng,
			title: 'Shot ' + path.getLength(),
			map: map,
			icon: '../Common/img/'+numShots+'greenMarker.png'
		});
		markers.push(marker);
		var shotNum = path.getLength();
		
		//Add the marker position in WKT format
		var markerLat = marker.getPosition().lat();
		var markerLon = marker.getPosition().lng();       		      			
		var wktelement = "\'POINT(" + markerLon + " " + markerLat + ")\'";
		thisShot["position"] = wktelement;

		shots.push(thisShot);
		addShotCard(shotNum);
	}
}

function lastShotClick() {
	holes[activeHole-1].doneHole = true;
	
	//get the lat and lng for the holePin for the purpose of adding to the path array
	var wkt = new Wkt.Wkt();
	wkt.fromObject(holePin);
	var pinLatLng = new google.maps.LatLng(wkt.components[0].y, wkt.components[0].x);
	path.push(pinLatLng);
	
	//send the results to the PHP script that adds the point to the database
	$.post("addShots.php", {shots: shots, holeNum: activeHole, roundId: roundId}, function(data){alertify.success("Hole Complete!");});
}

//Update the activeHole when the user switches holes via the carousel
$('#myCarousel').on('slide.bs.carousel', function (e) {
	//define the previously and currently active carousel views
	var active = $(e.target).find('.carousel-inner > .item.active');
	var from = active.index();
	var next = $(e.relatedTarget);
	var to = next.index();
	activeHole = to + 1;
	shots = holes[to].shots;
	//remove the pin for the previously active hole
	holePin.setMap(null);
	//remove the markers for the previously active hole
	for(i=0;i<holes[from].markers.length;i++){
		holes[from].markers[i].setMap(null);
	}
	//add the markers for the newly active hole
	for(i=0;i<holes[to].markers.length;i++){
		holes[to].markers[i].setMap(map);
	}
	//remove the poly for the previously active hole
	holes[from].poly.setMap(null);
	//add the poly for the newly active hole
	holes[to].poly.setMap(map);
	//remove the shot cards from the previous hole
	$("#shotBar").empty();
	//display shot cards for active hole
	if(holes[to].numShots>0){
		for (i=1; i<=holes[to].numShots;i++) {
			addShotCard(i,holes[to].shots[i-1].clubUsed);
		}
	} else {
		$("#shotBar").append("<div id='noShots'><h3>No Shots Yet</h3></div>");
	}
	//
	//update the bounds of the map to show the desired hole and redefine/update the 
	//holePin and holeTee objects for the newly active hole
	var latlngbounds = new google.maps.LatLngBounds();
	holeTee = getHoleFeatures(activeHole,'teemarker');
	holePin = getHoleFeatures(activeHole,'pinlocation');
	latlngbounds.extend(holeTee.position);
	latlngbounds.extend(holePin.position);
	map.fitBounds(latlngbounds);
	//add the pin for the newly active hole
	holePin.setMap(map);
	//update the par for the newly active hole
	par = getHoleFeatures(activeHole,'par');
	//update the pinLocation and teeLocation values from the newly active holeTee and
	//holePin objects
	pinLocation = holePin.position;
	teeLocation = holeTee.getPosition();
	//update the listeners to look at the newly active holePin object
	google.maps.event.addListener(holePin, 'click', lastShotClick);
	if(holes[activeHole-1].doneHole == false && holes[activeHole-1].numShots != 0) {
		google.maps.event.addListener(map,'mousemove',distanceToPin);	
	} else {
		google.maps.event.clearListeners(map,'mousemove');
		if(typeof(ib) != 'undefined') {
			ib.close(map);
		}
	}
});

function getHoleFeatures(holeNum,feature){
	if(feature=='pinlocation') {
		pinWkt = new Wkt.Wkt();
		pinVal = features[holeNum-1].pinlocation[0];
		pinoutput = pinWkt.read(pinVal);
		holePin = pinWkt.toObject();
		holePin.setOptions({
                icon: '../Common/img/pin.png'
            });
		return holePin;
	}
	if(feature=='par') {
		par = features[holeNum-1].par;
		return par;
	}
	if(feature=='yardage') {
		yardage = features[holeNum-1].yardage;
		return yardage;
	}
}

function addShotCard(shotNumber,clubUsed) {
	$("#noShots").hide();
	var shot = shots[shotNumber-1];
	$("#shotBar").append("<span class='shotInfo thumbnail'><h4>Shot " + shotNumber + "</h4><hr><span>Club used: <select class='clubUsed'>" + clubs.data + "</select></span><div>Distance to pin: " + shot.shotDistToPin + "yds</div><div>Shot from: " + shot.shotFrom + "</div></span>");
	if(typeof clubUsed != 'undefined'){
		$(".clubUsed").eq(shotNumber-1).val(clubUsed);
	}
	$("#shotBar").animate({scrollLeft: 10000},800);
	$(".clubUsed").eq(shotNumber-1).change(function(){
		shot.clubUsed = $(".clubUsed").eq(shotNumber-1).val();
	});
}

function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}

google.maps.event.addDomListener(window,'load',initialize);