var player,
	YTsrc,
	clips = [],
	numRecent = 5,	// number of recent videos to load
	numPopular = 5; // number of popular videos to load

// Load the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Get the most recent smrzs
$.getJSON('getrecent.php?n=' + numRecent, function(recentVideos) {
	str = '';
  	$.each(recentVideos, function(i, vid) {
  		str += '<div class="recentVideo">';
  		str += '	<a href="/'+ vid.id +'">';
  		str += '		<img src="http://img.youtube.com/vi/'+ vid.ytid +'/default.jpg" />';
  		str += '	</a>';
  		str += '</div>';
  	});
  	$("#recentVideos").html(str);
});

// Get the most popular smrzs
$.getJSON('getpopular.php?n=' + numPopular, function(recentVideos) {
	str = '';
  	$.each(recentVideos, function(i, vid) {
  		str += '<div class="popularVideo">';
  		str += '	<a href="/'+ vid.id +'">';
  		str += '		<img src="http://img.youtube.com/vi/'+ vid.ytid +'/default.jpg" />';
  		str += '	</a>';
  		str += '</div>';
  	});
  	$("#popularVideos").html(str);
});

function onYouTubeIframeAPIReady() {

	// check for smrzThis auto load
	var smrzThis = window.location.href.toString().match(/\?smrzThis=[A-z0-9-]*/);
	if ( smrzThis ) {
		var YTsrc =  smrzThis[0].split("=")[1];
		loadSnippingInterface();
	}

	// prevent auto form submission
	$("#mainForm").on("click", function() {
		return false;
	});

  	// Choose Video
	$("#go").on("click", function() {

		// Get the unique YouTube id for the video
		//YTsrc = $("#urlinputbox").val();
		var query = $("#urlinputbox").val().split('?')[1];
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
		    var pair = vars[i].split("=");
		    if(pair[0] == 'v'){YTsrc = pair[1];}
		}

		if (YTsrc == undefined) {
			alert("Error with URL");
		} else {
			loadSnippingInterface();
		}
  	});

	// Load the snipping interface (YTsrc must be defined)
  	function loadSnippingInterface() {

  		// Initialize the YouTube player
	    player = new YT.Player('ytplayer', {
	      height: '390',
	      width: '640',
	      videoId: YTsrc
	    });

	    // show the snipping interface
	    $("#page1").hide();
	    $("#page2").show();
  	}

  	// Bind snap event (taking clips)
  	var endClip = false;
  	var startTime = 0;
  	var clipNum = 0;
	$("#snap").on("click", function () {

		// Get the current timestamp
		var currentTime;
		// round down if starting clip, and round up if finish clip
		// to avoid cutting out parts people want, it's better
		// to have longer clips than missing parts
		if (endClip) {	
			currentTime = Math.ceil(player.getCurrentTime());
		} else {
			currentTime = Math.floor(player.getCurrentTime());
		}
		
				
		if ( currentTime <= startTime && endClip ) {

			alert("You cannot stop a clip behind the starting point."); //TODO: use bootstrap notification for this instead

		} else {

			var min = Math.floor(currentTime / 60);
			var sec = currentTime % 60;
			if (min < 10) {min = "0"+min;}
			if (sec < 10) {sec = "0"+sec;}

			if (endClip) {
				// finish a clip

				$("#clips li:last-child").append('<span class="label label-important finishtimestamp">' + 
						min + ":" + sec + '</span>');

				$("#clips li:last-child").removeClass("red-border");
				$("#clips li:last-child").append('<span class="delete-clip">X</span>');


				$("#snap").addClass("btn-success");
				$("#snap").removeClass("btn-danger");
				$("#snap").html("Start a Clip...");
				$("#cancel").hide();

				$(".delete-clip").on("click", function() {
					var clipNum = $(this).parent().attr('data-clipNum');
					clips[clipNum * 2] = -1;		//mark negative to clear when done
					clips[clipNum * 2 + 1] = -1;	//mark negative to clear when done
					$(this).parent().remove();
				});


				clips.push(startTime);
				clips.push(currentTime);
				clipNum = clipNum + 1;

			} else {
				// start a new clip

				startTime = currentTime;
				$("#clips").append('<li class="setoftimes red-border" data-clipNum="' + clipNum + '">' +
					'<span class="label label-success starttimestamp">'+ 
						min + ":" + sec + '</span></li>');

				$("#snap").removeClass("btn-success");
				$("#snap").addClass("btn-danger");
				$("#snap").html("Stop Recording...");
				$("#cancel").show();				


			}

			endClip = !endClip;

		}
	});

	$("#cancel").on("click", function() {
		//reset app and interface
		endClip = false;
		startTime = 0;
		$("#snap").addClass("btn-success");
		$("#snap").removeClass("btn-danger");
		$("#snap").html("Start a Clip...");
		$("#cancel").hide();

		//remove the clip element from the page
		$("#clips li[data-clipNum=" + clipNum + "]").remove();
	});

	// Bind Done event
	$("#done").on("click", function () {

		if ( clips.length == 0 ) {

			alert("You havn't taken any clips, that is was SMRZr is for!");

		} else {
			
			//if it's still recording, don't include the last clip
			if (endClip) {
				clips.pop();
			}

			//remove all timestamps with value -1 (this means they were deleted earlier)
			var i = 0;
			while (i < clips.length) {
				if (clips[i] == -1 ) {
					clips.splice( i, 1 );
				} else {
					i = i + 1;
				}
			}

			console.log(JSON.stringify(clips));

			//add the new snippet to the DB
			$.post('newsnippet.php?ytid='+YTsrc+'&timestamps='+JSON.stringify(clips), function(new_id) {
			  	// forward them to the permalink page using returned unique id
				window.location.href = "/" + new_id;
			});
		}
	});
}
