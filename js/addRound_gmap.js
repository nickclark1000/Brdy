// This example creates an interactive map which constructs a
// polyline based on user clicks. Note that the polyline only appears
// once its path property contains two LatLng coordinates.

var map;
var poly;

greenHit = false;

shotsToGreen=0;

pinWkt = new Wkt.Wkt();
pinVal = 'POINT(-79.72077814492877 43.667394322019845)';
ptoutput = pinWkt.read(pinVal);
holePin = pinWkt.toObject();

greenWkt = new Wkt.Wkt();
greenVal = 'POLYGON((-79.72079826149638 43.667455438390576,-79.72084922346767 43.667430215768924,-79.72087604555782 43.66740111273077,-79.72087738666232 43.66736133855585,-79.72086665782626 43.66733320558693,-79.72082374248203 43.667300222089324,-79.72076741609271 43.66727111898814,-79.72072718295749 43.667252687016784,-79.72066549215015 43.667249776704985,-79.72059977802928 43.667272089091746,-79.72055552158054 43.667321564354545,-79.72053942832645 43.6673603684537,-79.72055552158054 43.667392381816605,-79.72058636698421 43.66741857455537,-79.72060648355182 43.66743215597097,-79.72065878662761 43.66744573738349,-79.72070304307636 43.667454468289925,-79.72075802836116 43.667457378591806,-79.72079826149638 43.667455438390576))';
greenoutput = greenWkt.read(greenVal);
holeGreen = greenWkt.toObject();	

fairwayWkt = new Wkt.Wkt();
fairwayVal='POLYGON((-79.71845085925452 43.66799772219234,-79.71869762248389 43.66790265311434,-79.71874322003714 43.66788713161792,-79.71887464827887 43.66780758388578,-79.7190248519837 43.66776295950209,-79.71927966184012 43.667702813541105,-79.71955861157767 43.66763878712935,-79.71964712447516 43.667580581241204,-79.7196551711022 43.66752043509749,-79.71960689133994 43.667468049697405,-79.71950496739737 43.66744476728271,-79.71940840787283 43.66742730546575,-79.71923406428687 43.66742342506128,-79.719078496164 43.66742342506128,-79.7189524323403 43.66744864768578,-79.71883173293463 43.667487451702776,-79.7187539488732 43.66753013609248,-79.71864397830359 43.66758640183255,-79.71854205436102 43.66763490673857,-79.71837307519309 43.66769699296106,-79.71825774020544 43.66775519873631,-79.71821750707022 43.66780952407561,-79.7182309181153 43.66787355030526,-79.71828724450461 43.66796085869018,-79.71833552426688 43.66799772219234,-79.71839721507422 43.66800160255966,-79.71845085925452 43.66799772219234))'	
fairwayoutput = fairwayWkt.read(fairwayVal);
holeFairway = fairwayWkt.toObject();

teeblockWkt = new Wkt.Wkt();
teeblockVal='POLYGON((-79.71721751242058 43.66822181299468,-79.71730066090004 43.66813935543742,-79.71729931979553 43.66811801346298,-79.7172765210189 43.66809182102942,-79.71724165230171 43.66808406030615,-79.71706730871574 43.66813256481002,-79.71704048662559 43.668163607671914,-79.71704048662559 43.668197560783696,-79.71706730871574 43.668242184844324,-79.71709815411941 43.66825382589816,-79.71713436394111 43.66825382589816,-79.71717996149437 43.66824024466846,-79.71721751242058 43.66822181299468))'
teeblockoutput = teeblockWkt.read(teeblockVal);
holeTeeblock = teeblockWkt.toObject();

//Boolean to keep track of whether the hole is completed
doneHole = false;

// Enable the visual refresh
google.maps.visualRefresh = true;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(43.667872,-79.715853),
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
	
	var polyOptions = {
		strokeColor: '#000000',
		strokeOpacity: 1.0,
		strokeWeight: 3
	};
	poly = new google.maps.Polyline(polyOptions);
	poly.setMap(map);
	
	
 	// Add a listener for the map click event
 	google.maps.event.addListener(map, 'click', addLatLng);
  	
	holePin.setMap(map);
}

/**
 * Handles click events on a map, and adds a new point to the Polyline.
 * @param {google.maps.MouseEvent} event
 */
function addLatLng(event) {
  if(doneHole == false){
	  var path = poly.getPath();
	  var shotsToGreen;

	  // Because path is an MVCArray, we can simply append a new coordinate
	  // and it will automatically appear.
	  path.push(event.latLng);
	  
	  var numShots = path.getLength();
	  
	  //Make sure tee block is clicked in first
	  if (numShots == 1 && google.maps.geometry.poly.containsLocation(event.latLng, holeTeeblock)) {
		  alert("teeblock clicked first");
	  } else if (numShots == 1) {
	  	  path.clear();
	  	  alert("Your first shot must be from one of the tee blocks!");
	  	  return false;
	  }
	  
	  //Check if fairway is hit in regulation
	  if (numShots == 2 && google.maps.geometry.poly.containsLocation(event.latLng, holeFairway)) {
			document.getElementById("holeFairwayHit").innerHTML = "Yes";
	  }
	  
	  //Check if green is hit in regulation
	  if (numShots == 3 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)) {
		  document.getElementById("holeGreenHit").innerHTML = "Yes";
		  greenHit = true;
		  shotsToGreen = 2;
	  }
	  
	  if (greenHit == false && numShots > 3 && google.maps.geometry.poly.containsLocation(event.latLng, holeGreen)) {
	  	  greenHit = true;
	  	  shotsToGreen = numShots - 1;
	  }
	  
	  if (greenHit == true) {
	  	 numPutts = numShots - shotsToGreen;
	  	 document.getElementById("holePutts").innerHTML = numPutts;
	  	 alert(numPutts + 'f' + numShots + 'f' + shotsToGreen);
	  }
	  
	  document.getElementById("holeScore").innerHTML = numShots;
	  
	  if(numShots == 1) {
	  	document.getElementById("holeShots").innerHTML ="<tr><td>Shot #" + numShots + "</td></tr>";
  	  } else {
  	    document.getElementById("holeShots").innerHTML +="<tr><td>Shot #" + numShots + "</td></tr>";
  	  }
	  //Add the final shot that goes into the hole
	  google.maps.event.addListener(holePin, 'click', function(){
		var wkt = new Wkt.Wkt();
		wkt.fromObject(holePin);
		var pinLatLng = new google.maps.LatLng(wkt.components[0].y, wkt.components[0].x);
		path.push(pinLatLng);
		doneHole = true;
	  });  
  
	  // Add a new marker at the new plotted point on the polyline.
	  var marker = new google.maps.Marker({
		position: event.latLng,
		title: 'Shot #' + path.getLength(),
		map: map
	  });
  
//	var form = $(".pointform").clone().show();
//	var infowindowcontent = form[0];
	var infowindow = new google.maps.InfoWindow({
		content: marker.title,
		position: marker.position
	});
	infowindow.open(map,marker);
  	
	//Show info window when you click on a marker
	google.maps.event.addListener(marker, 'click', function() {
		var infowindow = new google.maps.InfoWindow({
		content: marker.title
		});
		infowindow.open(map,this);
	});
  }
}

google.maps.event.addDomListener(window,'load',initialize);