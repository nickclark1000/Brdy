// Enable the visual refresh
google.maps.visualRefresh = true;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(43.667872,-79.715853),
		zoom: 16,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
    
	var drawingManager = new google.maps.drawing.DrawingManager({
		drawingControl: false,
		drawingControlOptions: {
			drawingModes: [
				google.maps.drawing.OverlayType.MARKER,
 				google.maps.drawing.OverlayType.CIRCLE,
				google.maps.drawing.OverlayType.POLYGON,
 				google.maps.drawing.OverlayType.POLYLINE
 			]
 		},
		markerOptions: {
  			draggable: true,
  			icon: '../Common/img/marker.png',
		}
	});
  
	//adding wicket geometry
//	document.getElementById("wicketbtn").addEventListener("click",function() {
		polywkt = new Wkt.Wkt();
		val = 'POINT(-79.716832 43.668273)';

		polygonval = 'POLYGON ((-79.7168190032 43.6681927103, -79.7168190032 43.6683353132, -79.7170161456 43.6683353132, -79.7170161456 43.6681927103, -79.7168190032 43.6681927103))';
		polyval = 'POLYGON((-79.72079826149638 43.667455438390576,-79.72084922346767 43.667430215768924,-79.72087604555782 43.66740111273077,-79.72087738666232 43.66736133855585,-79.72086665782626 43.66733320558693,-79.72082374248203 43.667300222089324,-79.72076741609271 43.66727111898814,-79.72072718295749 43.667252687016784,-79.72066549215015 43.667249776704985,-79.72059977802928 43.667272089091746,-79.72055552158054 43.667321564354545,-79.72053942832645 43.6673603684537,-79.72055552158054 43.667392381816605,-79.72058636698421 43.66741857455537,-79.72060648355182 43.66743215597097,-79.72065878662761 43.66744573738349,-79.72070304307636 43.667454468289925,-79.72075802836116 43.667457378591806,-79.72079826149638 43.667455438390576))';
		output = polywkt.read( polygonval );
		polyobj = polywkt.toObject();
		polyobj.setMap(map);
		pointwkt = new Wkt.Wkt();
	//	val = 'POINT(-79.72 43.667)';
		ptoutput = pointwkt.read(val);
		pointobj = pointwkt.toObject();
		pointobj.setMap(map);
		
//	});
	
	google.maps.event.addListener(map, 'click', function(e) {
		var result;
		if (google.maps.geometry.poly.containsLocation(e.latLng, polyobj)) {
			alert("green in regulation");
		} else { 
			alert("missed green");
		}
	});

	drawingManager.setMap(map);

	//Set the drawing mode using custom button
    document.getElementById("polygonBtn").onclick= function(){drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);};
	document.getElementById("pointBtn").onclick= function(){drawingManager.setDrawingMode(google.maps.drawing.OverlayType.MARKER);};
	document.getElementById("polylineBtn").onclick= function(){drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYLINE);};    	  			  		

	google.maps.event.addListener(drawingManager,'markercomplete',function(marker) {
  			//adding a point feature 
	  		var form = $(".pointform").clone().show();
	  		var infowindowcontent = form[0];
	  		var infowindow = new google.maps.InfoWindow({
				content: infowindowcontent
	  		}); 
	  
	  		google.maps.event.addListener(marker,'click',function() {
					infowindow.open(map,marker);   
			}); 
					
	  		infowindow.open(map,marker);
	   
			//when user clicks on the "submit" button
	  		form.submit({name: "marker"}, function(event) {
	
					//prevent the default form behavior (which would refresh the page)
	      			event.preventDefault();
	      			
					var markerLat = marker.getPosition().lat();
	         		var markerLon = marker.getPosition().lng();
	         		      			
	      			var wktelement = "'POINT(" + markerLon + " " + markerLat + ")'";
	
	      			//put all form elements in a "data" object
	      			var pointdata = {				
						holeNum:	$("select[name=holeNum]", this).val(),				
						pointType: $("select[name=pointType]", this).val(),
						pointSubType: $("select[name=pointSubType]", this).val(),
						pointLoc: wktelement
					};
				
	   				//send the results to the PHP script that adds the point to the database
					$.post("addPointFeature.php", pointdata);	
	  		});	  
  	});

	/*//adding a course  				
		  		var courseform = $(".courseform").clone().show();
		  		var courseinfowindowcontent = courseform[0];
		  		var courseinfowindow = new google.maps.InfoWindow({
						content: courseinfowindowcontent
		  				}); 
		  
		  		google.maps.event.addListener(marker,'click',function() {
						infowindow.open(map,marker);   
						}); 
						
		  		courseinfowindow.open(map,marker);
		   
				//when user clicks on the "submit" button
		  		form.submit({name: "marker"}, function(event) {
		
						//prevent the default form behavior (which would refresh the page)
		      			event.preventDefault();
				
		      			//put all form elements in a "data" object
		    			var data = {
							name: $("input[name=inputName]", this).val(),
		        			yardage: $("input[name=inputYardage]", this).val(),	
		         			lat: marker.getPosition().lat(),
		         			lon: marker.getPosition().lng() 
		      				};
					
		   				//send the results to the PHP script that adds the point to the database
						$.post("../newCoursesSloan.php", data);
		      			return false;
		  		});
	*/

 	//adding course features via polylinecomplete
 	google.maps.event.addListener(drawingManager,'polylinecomplete',function(polyline) {
		var featureform = $(".polylineform").clone().show();
	  	var infowindowfeaturecontent = featureform[0];
	  	var infofeaturewindow = new google.maps.InfoWindow({
			content: infowindowfeaturecontent
	  	});
	  	
	  	//need to get a lat/lon pair to set where to display the info window
	  	var polylength=polyline.getPath().getArray().length;
	    var lastarray=polyline.getPath().getAt(polylength-1);	
	  	infofeaturewindow.setPosition(lastarray);
	  		
	  	infofeaturewindow.open(map);
	  	
	  	//when user clicks on the "submit" button
	  	featureform.submit({name: "polygon"}, function (event) {
	  		//prevent the default form behavior (which would refresh the page)
			event.preventDefault();
			
			var path = polyline.getPath();
			var wktelement = "'LINESTRING(";
			for (var i =0; i < path.length; i++) {
					var lat_i = path.getAt(i).lat();
					var lng_i = path.getAt(i).lng();
					wktelement += lng_i + " "+ lat_i + ",";
			}
			wktelement = wktelement.slice(0, -1);
			wktelement += ")'";
			//	put all data elements in a "data" object
	 		var polylinedata = {				
				holeNum:	$("select[name=holeNum]", this).val(),				
				polylineType: $("select[name=polylineType]", this).val(),
		  		polylineValue: wktelement
			};
			$.post("addPolylineFeature.php",polylinedata);
 		});
 	});
 	//adding course features via polygoncomplete
	google.maps.event.addListener(drawingManager,'polygoncomplete',function(polygon) {
		//need to get a lat/lon pair to set where to display the info window
	  	var polylength = polygon.getPath().getArray().length;
	    var lastarray = polygon.getPath().getAt(polylength-1);
	    
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i<polylength; i++) {
		   bounds.extend(new google.maps.LatLng(polygon.getPath().getAt(i).lat(), polygon.getPath().getAt(i).lng()));
		}
		var center = bounds.getCenter();
		var centerMarker = new google.maps.Marker({
			position: center,
			map: map
		});
		console.log(center);
	  	var featureform = $(".polygonform").clone().show();
	  	var infowindowfeaturecontent = featureform[0];
	  	var infofeaturewindow = new google.maps.InfoWindow({
			content: infowindowfeaturecontent
	  	});
	  		
	  	infofeaturewindow.setPosition(lastarray);
	  		
	  	infofeaturewindow.open(map);
	  	
	  	//when user clicks on the "submit" button
	  	featureform.submit({name: "polygon"}, function (event) {
	
			//prevent the default form behavior (which would refresh the page)
			event.preventDefault();
			
			//  	var coordinates = (polygon.getPath().getArray());
		  	var numpoints = polygon.getPath();
			var wktelement = "'POLYGON((";
			
			for (var i =0; i < numpoints.length; i++) {
		        var lat_i = numpoints.getAt(i).lat();
		        var lng_i = numpoints.getAt(i).lng();
		        wktelement += lng_i + " "+ lat_i + ",";
			}
			for (var i =0; i < 1 ; i++) {
		        var lat_i = numpoints.getAt(i).lat();
		        var lng_i = numpoints.getAt(i).lng();
		        wktelement += lng_i + " "+ lat_i;
			}	      
		   wktelement += "))'";				
			
			//	put all data elements in a "data" object
	 		var polygondata = {				
				holeNum:	$("select[name=holeNum]", this).val(),				
				polygonType: $("select[name=polygonType]", this).val(),
		  		polygonValue: wktelement
			};
		
			//send the results to the PHP script that adds the point to the database
			$.post("addPolygonFeature.php",polygondata);
			return false;
			// $.each(wktelement, function(){alert(wktelement);});
			
			// close the infowindow
			infofeaturewindow.close();
      			
  	   }); 
  });    	
}

var clientId = 'NIY1H3QPT43DVZJ2FG2EK5YFRMILD1OSZMHWAGHX4RNJ4H3T';
var clientSecret = 'OG12GDFTJJT3IXNQOG431LR0IFIFJGMYTVD0LWT3Y3EN5MET';
var query = 'golf';

navigator.geolocation.getCurrentPosition(show_map);

latitude = '';
longitude = '';

function show_map(position) {
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
  console.log(latitude + ',' + longitude);
  // let's show a map or do something interesting!
  getFoursquareData();
}
function getFoursquareData() {
$.getJSON('https://api.foursquare.com/v2/venues/search?categoryId=4bf58dd8d48988d1e6941735&near=Moncton,NB&query=' + query + '&client_id=' + clientId + '&client_secret=' + clientSecret + '&v=20130209',
    function(data) {
        $.each(data.response.venues, function(i,venues){
            content = '<p>' + venues.name + '</p>';
            $(content).appendTo("#names");
       });
});
}

google.maps.event.addDomListener(window,'load',initialize);
