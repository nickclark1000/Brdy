var map;
var poly;
var path = [];
var numShots;
var shots = [];
var markers = [];
var poly = [];
var prevMarkerPosition;
google.load("earth","1");
var numPutts = 0;
var holes = [];
activeHole = 1;
var features = {};
greenHit = false;
var pinLocation;
thisHole = {};
userId = 1;
shotsToGreen = 0;
clubs = {};

//load the html of the carousel items
document.getElementsByClassName("carousel-inner")[0].innerHTML = "<div class='active item' style='height:90px; text-align:center'><h4 style='margin-bottom:0px'>Hole 1</h4><table class='table-condensed' style='margin:auto'><thead><tr><th style='padding-bottom: 0px'>Score</th><th style='padding-bottom: 0px'>Fairway</th><th style='padding-bottom: 0px'>Green</th><th style='padding-bottom: 0px'>Putts</th></tr></thead><tbody><tr><td class='holeScore'>-</td><td class='holeFairwayHit'>-</td><td class='holeGreenHit'>-</td><td class='holePutts'>-</td></tr></tbody></table></div>";
for(i=2;i<19;i++){
	$( ".carousel-inner" ).append("<div class='item' style='height:90px; text-align:center'><h4 style='margin-bottom:0px'>Hole "+ i +"</h4><table class='table-condensed' style='margin:auto'><thead><tr><th style='padding-bottom: 0px'>Score</th><th style='padding-bottom: 0px'>Fairway</th><th style='padding-bottom: 0px'>Green</th><th style='padding-bottom: 0px'>Putts</th></tr></thead><tbody><tr><td class='holeScore'>-</td><td class='holeFairwayHit'>-</td><td class='holeGreenHit'>-</td><td class='holePutts'>-</td></tr></tbody></table></div>");
}

//load the features for every hole on page load
var holeFeatures = [];
$.ajax({
	type: "GET",
	url: "getHoleFeatures.php",
	data: {'data': holeFeatures},                         
	success: function(holeFeatures){                    
		features = JSON.parse(holeFeatures);
		holePin = getHoleFeatures(1,'pinlocation');
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
		thisHole["greenHit"] = false;
		thisHole["numShots"] = 0;
		thisHole["numPutts"] = 0;
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
		greenHit = holes[arrayHole].greenHit;
		shots = holes[arrayHole].shots;
		poly = holes[arrayHole].poly;
		path = poly.getPath();
		var shotsToGreen;
		thisShot = {};
		thisHole = {};
		thisShot["holeNum"] = activeHole;
		// Because path is an MVCArray, we can simply append a new coordinate
		// and it will automatically appear.
		path.push(event.latLng);
		holes[arrayHole].numShots = path.getLength();
		numShots = holes[arrayHole].numShots;
		holeTeeblock = getHoleFeatures(activeHole,'teeblock');
		holeFairway = getHoleFeatures(activeHole,'fairway');
		holeGreen = getHoleFeatures(activeHole,'green');
		if (numShots != 0) {
			google.maps.event.addListener(map,'mousemove',distanceToPin);
		}
		//Make sure tee block is clicked in first
		if (numShots == 1 && google.maps.geometry.poly.containsLocation(event.latLng, holeTeeblock)==false) {
			path.clear();
			alert("Your first shot must be from one of the tee blocks!");
			return false;
		} else if (numShots == 1 && google.maps.geometry.poly.containsLocation(event.latLng, holeTeeblock)==true) {
			thisShot["shotFrom"] = 'teemarker';
		}
		// Add a new marker at the new plotted point on the polyline.
		var marker = new google.maps.Marker({
			position: event.latLng,
			title: 'Shot ' + path.getLength(),
			map: map,
			shotnum: path.getLength()
		});

		if (par != 3) {
			//Check if fairway is hit in regulation
			if (numShots == 2 && google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==false) {
				document.getElementsByClassName("holeFairwayHit")[activeHole-1].innerHTML = "No";
				thisShot["shotFrom"] = 'rough';
			} else if (numShots == 2 && google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==true) {
				document.getElementsByClassName("holeFairwayHit")[activeHole-1].innerHTML = "Yes";
				thisShot["shotFrom"] = 'fairway';
			}
		}
		if (par == 5 && numShots == 3 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)==true) {
			thisShot["shotFrom"] = 'green';
			document.getElementsByClassName("holeGreenHit")[activeHole-1].innerHTML = "Yes";
			greenHit = true;
			shotsToGreen = 2;
		} else if (par == 5 && numShots == 3 && google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==true) {
			thisShot["shotFrom"] = 'fairway';
		} else if (par == 5 && numShots == 3 && google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==false) {
			thisShot["shotFrom"] = 'rough';
		}
		//Check if green is hit in regulation
		if (numShots == par-1 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)==false) {
			document.getElementsByClassName("holeGreenHit")[activeHole-1].innerHTML = "No";
			if (google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==false) {
				thisShot["shotFrom"] = 'rough';
			} else {
				thisShot["shotFrom"] = 'fairway';
			}
		} else if (numShots == par-1 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)==true) {
			document.getElementsByClassName("holeGreenHit")[activeHole-1].innerHTML = "Yes";
			greenHit = true;
			shotsToGreen = par-2;
			thisShot["shotFrom"] = 'green';
		}
		if (greenHit == false && numShots > par-1 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)==false) {
			if (google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)==false) {
				thisShot["shotFrom"] = 'rough';
			} else {
				thisShot["shotFrom"] = 'fairway';
			}
		} else if (greenHit == false && numShots > par-1 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)==true) {
			greenHit = true;
			shotsToGreen = numShots - 1;
			thisShot["shotFrom"] = 'green';
		}
		if (greenHit == true) {
			numPutts = numPutts + 1;
			document.getElementsByClassName("holePutts")[activeHole-1].innerHTML = numPutts;
			thisShot["shotFrom"] = 'green';
		}
		document.getElementsByClassName("holeScore")[activeHole-1].innerHTML = numShots;
		//Add marker to the array
		markers.push(marker);
		pinLocation = holePin.position;
		thisShot["shotNum"] = path.getLength();
		shotNum = thisShot["shotNum"];
		//Calculate the distance to the pin
		shotDistToPin = google.maps.geometry.spherical.computeDistanceBetween(marker.position,pinLocation);
		//Convert from meters to yards and round
		shotDistToPin = Math.round(shotDistToPin * 1.09361);
		thisShot["shotDistToPin"] = shotDistToPin;
		//Add the marker position in WKT format
		var markerLat = marker.getPosition().lat();
		var markerLon = marker.getPosition().lng();       		      			
		var wktelement = "\'POINT(" + markerLon + " " + markerLat + ")\'";
		thisShot["position"] = wktelement;
		// Calculate the shot distance
		if(numShots >= 2) {
			prevShotDist = google.maps.geometry.spherical.computeDistanceBetween(marker.position,prevMarkerPosition);
			prevShotDist = Math.round(prevShotDist * 1.09361);
			prevShotNum = numShots - 2;
			shots[prevShotNum].shotDist = prevShotDist;
		}
		//update the prevMarkerPosition
		prevMarkerPosition = marker.position;
		//add thisShot to the shots array
		shots.push(thisShot);	  
		//define infowindow
		var infowindow = new google.maps.InfoWindow({
			content: marker.title,
			position: marker.position
		});
		//show infowindow upon creation
		infowindow.open(map,marker);
		//Show info window when you click on a marker
		google.maps.event.addListener(marker, 'click', function() {
			var infowindow = new google.maps.InfoWindow({
				content: marker.title
			});
			shotNum = marker.shotnum;
			//addShotDetails(this.shotnum);
			infowindow.open(map,this);
		});

		addShotCard(marker.shotnum);
		
	}
}

function lastShotClick() {
	//define the target line for the active hole
	holeTarget = getHoleFeatures(activeHole,'targetline');
	//mark the active hole as done
	holes[activeHole-1].doneHole = true;
	//get the lat and lng for the holePin for the purpose of adding to the path array
	var wkt = new Wkt.Wkt();
	wkt.fromObject(holePin);
	var pinLatLng = new google.maps.LatLng(wkt.components[0].y, wkt.components[0].x);
	path.push(pinLatLng);
	// subtract 2 from the length to accommodate the counting from 0 and identifying the last shot marker
	y = path.getLength() - 2;
	x = markers[y];
	//calculate the shot distance between the last shot location and the pin location
	z = google.maps.geometry.spherical.computeDistanceBetween(x.position,pinLocation);
	//convert to yards
	shots[y].shotDist = z * 1.09361;
	//heading calculation of tee shot
	shotHeading = google.maps.geometry.spherical.computeHeading(markers[0].position,markers[1].position);
	//heading calculation of best target pt
	//define the number of target pts on the hole (for when hole is a dog leg)
	targetPts = holeTarget.getPath().getLength();
	//pick the second element (1) on the target path by default and then loop through to find a better match
	closestPt = 1;
	closestDistance = 99999;
	//start the loop at 1 since 0 element is on the tee block
	for(i=1; i<targetPts; i++) {
		distance = google.maps.geometry.spherical.computeDistanceBetween(markers[1].position, holeTarget.getPath().getAt(i));
		if (distance < closestDistance) {
			closestPt = i;
			closestDistance = distance;
		}
	}
	targetHeading = google.maps.geometry.spherical.computeHeading(markers[0].position,holeTarget.getPath().getAt(closestPt));
	//determine the direction off target (Left L or right R)
	dirOffTarget = getDirOffTarget(shotHeading,targetHeading);
	shots[0]["dirOffTarget"] = dirOffTarget;
	//distance from fairway calculations
	//use angle between shot and target headings to get cosine
	cosTheta = Math.abs(Math.cos(getRadians(shotHeading - targetHeading)));
	//find the adjacent distance and make sure to convert to meters for Google calculations that follow
	adjDistance = shots[0].shotDist * cosTheta * 0.9144;
	//find the location of the right-angle corner of the triangle
	cornerPt = google.maps.geometry.spherical.computeOffset(markers[0].position, adjDistance, targetHeading);
	//find distance between cornerPt/middle of fairway and 2nd shot location. Make sure to convert to yards. Assign to first shot. 
	ydsOffFairwayCenter = google.maps.geometry.spherical.computeDistanceBetween(cornerPt, markers[1].position) * 1.09361;
	shots[0]["ydsOffFairwayCenter"] = ydsOffFairwayCenter;
	//if fairway was missed, use Google interpolate and containsLocation methods to find approximate location of the edge of fairway
	if (shots[1]["shotFrom"] !== 'fairway') {
		for (i=1; i<1000; i++) {
			intersectPt = google.maps.geometry.spherical.interpolate(cornerPt, markers[1].position, i/1000);
			if (google.maps.geometry.poly.containsLocation(intersectPt, holeFairway)==false) {
				break;
			}
		}	
		//calculate distance beween the edge of fairway and 2nd shot location. Make sure to convert to yards.
		ydsOffFairway = google.maps.geometry.spherical.computeDistanceBetween(intersectPt, markers[1].position) * 1.09361;
		shots[0]["ydsOffFairway"] = ydsOffFairway;
	}
	google.maps.event.clearListeners(map,'mousemove');
	ib.close(map);
	//send the results to the PHP script that adds the point to the database
	$.post("addShots.php", {shots: shots}, function(data){alert('data loaded:' + data );});
}

//Update the activeHole when the user switches holes via the carousel
$('#myCarousel').on('slide.bs.carousel', function (e) {
	//define the previously and currently active carousel views
	var active = $(e.target).find('.carousel-inner > .item.active');
	var from = active.index();
	var next = $(e.relatedTarget);
	var to = next.index();
	activeHole = to + 1;
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
	console.log(par);
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
var boxText = document.createElement("div");
boxText.style.cssText = "border: 1px solid black;  background: white; padding: 5px;";

function distanceToPin(event) {     
	var myOptions = {
		 content: boxText
		,disableAutoPan: false
		,maxWidth: 0
		,pixelOffset: new google.maps.Size(-70, 15)
		,zIndex: null
		,boxStyle: { 
		  opacity: 0.75
		  ,width: "140px"
		 }
		,closeBoxURL: ""
		,infoBoxClearance: new google.maps.Size(1, 1)
		,isHidden: false
		,pane: "floatPane"
		,enableEventPropagation: false              
	};

	ib = new InfoBox(myOptions);
	ib.setPosition(event.latLng);
	ib.open(map);
	//define the latLng of the mousemove event
	mouseLatLng = event.latLng;
	
	//compute the distance between the mouse and the holePin position
	distMeters = google.maps.geometry.spherical.computeDistanceBetween(mouseLatLng,holePin.position);
	//convert meters to yards and feet
	distYards = Math.round(distMeters * 1.09361);
	distFeet = Math.round(distMeters * 3.09361);
	if(distYards>=20){
	boxText.innerHTML = 'Distance to pin: ' + distYards + 'yds';
	//	document.getElementById("distanceToPin").innerHTML = distYards + 'yds';
	} else {
	boxText.innerHTML = 'Distance to pin: ' + distFeet + 'ft';
		//document.getElementById("distanceToPin").innerHTML = distFeet + 'ft';
	}
}

function getHoleFeatures(holeNum,feature){
	if(feature=='teemarker') {
		teeWkt = new Wkt.Wkt();
		teeVal = features[holeNum-1].teemarker[0];
		teeoutput = teeWkt.read(teeVal);
		holeTee = teeWkt.toObject();
		return holeTee;
	}
	if(feature=='pinlocation') {
		pinWkt = new Wkt.Wkt();
		pinVal = features[holeNum-1].pinlocation[0];
		pinoutput = pinWkt.read(pinVal);
		holePin = pinWkt.toObject();
		return holePin;
	}
	if(feature=='teeblock') {
		teeblockWkt = new Wkt.Wkt();
		teeblockVal = features[holeNum-1].teeblock[0];
		teeblockoutput = teeblockWkt.read(teeblockVal);
		holeTeeblock = teeblockWkt.toObject();
		return holeTeeblock;
	}
	if(feature=='fairway') {
		fairwayWkt = new Wkt.Wkt();
		fairwayVal = features[holeNum-1].fairway;
		fairwayoutput = fairwayWkt.read(fairwayVal);
		holeFairway = fairwayWkt.toObject();
		return holeFairway;
	}
	if(feature=='green') {
		greenWkt = new Wkt.Wkt();
		greenVal = features[holeNum-1].green;
		greenoutput = greenWkt.read(greenVal);
		holeGreen = greenWkt.toObject();
		return holeGreen;
	}
	if(feature=='targetline') {
		targetWkt = new Wkt.Wkt();
		targetVal = features[holeNum-1].targetline;
		targetoutput = targetWkt.read(targetVal);
		holeTarget = targetWkt.toObject();
		return holeTarget;
	}
	if(feature=='par') {
		par = features[holeNum-1].par;
		return par;
	}
}

function getDirOffTarget(shotHeading, targetHeading) {
	s = shotHeading;
	t = targetHeading;
	var sQuad;
	var tQuad;
	// determine t quadrant
	if (t >= 0 && t < 90) {
		tQuad = 1;
	} else if (t > 90 && t < 180) {
		tQuad = 2;
	} else if (t < -90 && t >= -180) {
		tQuad = 3;
	} else {
		tQuad = 4;
	}
	//determine s quadrant
	if (s >= 0 && s < 90) {
		sQuad = 1;
	} else if (s > 90 && s < 180) {
		sQuad = 2;
	} else if (s < -90 && s >= -180) {
		sQuad = 3;
	} else {
		sQuad = 4;
	}
	// if tQuad is the same quadrant as sQuad
	if (sQuad == tQuad) {
		if (s > t) {
			dirOffTarget = 'R';
		} else {
			dirOffTarget = 'L';
		}
	} else
	//if tQuad is 1
	if (sQuad == 2 && tQuad == 1) {
		dirOffTarget = 'R';
	} else
	if (sQuad == 4 && tQuad == 1) {
		dirOffTarget = 'L';
	} else
	//if tQuad is 2
	if (sQuad == 1 && tQuad == 2) {
		dirOffTarget = 'L';
	} else
	if (sQuad == 3 && tQuad == 2) {
		dirOffTarget = 'R';
	} else
	//if tQuad is 3
	if (sQuad == 2 && tQuad == 3) {
		dirOffTarget = 'L';
	} else
	if (sQuad == 4 && tQuad == 3) {
		dirOffTarget = 'R';
	} else
	//if tQuad is 4
	if (sQuad == 3 && tQuad == 4) {
		dirOffTarget = 'L';
	} else
	if (sQuad == 1 && tQuad == 4) {
		dirOffTarget = 'R';
	}
	return dirOffTarget;
}

function getRadians(degrees) {
  	return degrees * Math.PI / 180;
}

function addShotDetails(shotNumber) {
	document.getElementById("modalHeader").innerHTML = 'Shot ' + shotNumber;
	document.getElementById("shotLocation").innerHTML = shots[shotNumber-1].shotFrom;
		document.getElementById("distToPin").innerHTML = shots[shotNumber-1].shotDistToPin;
	if (shots[shotNumber-1].clubUsed > 0) {
		document.getElementById("clubUsed").selectedIndex = shots[shotNumber-1].clubUsed;
	}
	var club = shots[shotNumber-1].clubUsed || $("#clubUsed option:selected").val();
	$("#modalSave").unbind('click').click(function() {
		shots[shotNumber-1].clubUsed = document.getElementById("clubUsed").selectedIndex;
		
	});
	$("#modalClose").unbind('click').click( function() {
		document.getElementById("clubUsed").selectedIndex = 0;
	});
	$('#myModal').modal('show');
}

function addShotCard(shotNumber) {
	$("#noShots").hide();
	var shot = shots[shotNumber-1];
	$("#shotBar").append("<span class='shotInfo thumbnail'><h4>Shot " + shotNumber + "</h4><hr><span>Club used: <select class='clubUsed'>" + clubs.data + "</select></span><div>Distance to pin: " + shot.shotDistToPin + "yds</div></span>");
	$("#shotBar").animate({scrollLeft: 10000},800);
	$(".clubUsed").eq(shotNumber-1).change(function(){
		shots[shotNumber-1].clubUsed = $(".clubUsed").eq(shotNumber-1).val();
		console.log(shots[shotNumber-1]);
	});
//	shots[shotNumber-1].clubUsed = $(".clubUsed").eq(shotNumber-1).val();

}


google.maps.event.addDomListener(window,'load',initialize);