videoCount = 1;
$('#add-video').click(function(){
	videoCount += 1;

	addVideo(videoCount);
	$('#player1').toggleClass('col-sm-12 col-sm-6');
	$('#player2').toggleClass('col-sm-12 col-sm-6');
	respondCanvas();
	

});

function getVideoCount(){
	return videoCount;
}

function addVideo(){
	//add html markup
	var videoCount=1;
	var videoId = localStorage.videoId;
	$('#video-wrapper-grp').append("<div  id='video-wrapper"+videoCount+"' style='height:500px; width:600px;'></div>");
	$('#another-wrapper').append("<div id='player"+videoCount+"'> \
		<div class='row'> \
		<button class='btn pull-left' id='play-btn"+videoCount+"' style='position:relative'>Play</button> \
	    <div class='pull-right' id='slider"+videoCount+"' style='width:80%'></div> \
	    </div> \
	    </div>");

	if(videoCount == 1){
	    wrapper1 = Popcorn.HTMLYouTubeVideoElement( "#video-wrapper1");
	    wrapper1.src = "https://www.youtube.com/watch?v="+videoId;
	 
	     var pop1 = Popcorn(function(){
	     	a1 = Popcorn(wrapper1);
	     	respondCanvas();

	     });

	     $('#play-btn1').click(function(){
	        if(a1.paused()) {
	          a1.play();
	          $(this).html('Pause');
	        } else {
	          a1.pause();
	          $(this).html('Play');
	        }
	     });
	     var slider1 = $( "#slider1" ).slider({
	        min: 0,
	        max: 5,
	        step: 0.1,
	        slide: function() {
	          a1.currentTime($('#slider1').slider('value'));
	          console.log($('#slider1').slider('value'));
	        }
	      });
	     a1.on('loadedmetadata', function(){
	     	$( "#slider1" ).slider( "option", "max", a1.duration() );
	     });
	     a1.on('timeupdate', function(){
	     	$('#slider1').slider("value", a1.currentTime());
	     });
	     
 	} else {
 		wrapper2 = Popcorn.HTMLYouTubeVideoElement( "#video-wrapper2");
	    wrapper2.src = "https://www.youtube.com/watch?v="+videoId;
	 
	     var pop2 = Popcorn(function(){
	     	a2 = Popcorn(wrapper2);
	     	respondCanvas();
	     });

	     $('#play-btn2').click(function(){
	        if(a2.paused()) {
	          a2.play();
	          $(this).html('Pause');
	        } else {
	          a2.pause();
	          $(this).html('Play');
	        }
	     });
	     var slider2 = $( "#slider2").slider({
	        min: 0,
	        max: 5,
	        step: 0.1,
	        slide: function() {
	          a2.currentTime($('#slider2').slider('value'));
	          console.log($('#slider2').slider('value'));
	        }
	      });
	     a2.on('loadedmetadata', function(){
	     	$( "#slider2" ).slider( "option", "max", a2.duration() );
	     });
	     a2.on('timeupdate', function(){
	     	$('#slider2').slider("value", a2.currentTime());
	     });
 	}
      
}

function removeVideo(){

}