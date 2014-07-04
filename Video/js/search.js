// After the API loads, call a function to enable the search box.
/*** handleAPIloaded is now being called in uploads.js ***/
// function handleAPILoaded() {
//   $('#search-button').attr('disabled', false);
// }

// Search for a specified string.
function search() {
  alert('clicks');
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet'
  });

  request.execute(function(response) {
    var str = JSON.stringify(response.result);
    $('#video-showcase').hide();
    $('#search-list').show();
    $('#search-list').empty();
    $('#search-list').append("<hr>");
    for(i=0; i<response.result.items.length; i++){
      
      $('#search-list').append("<div class='media' id='"+response.result.items[i].id.videoId+"'><a class='pull-left' ><img class='media-object' src='" + response.result.items[i].snippet.thumbnails.default.url + "' alt='...'></a><div class='media-body'><h4 class='media-heading'>" + response.result.items[i].snippet.title + "</h4>"+ response.result.items[i].snippet.description +"</div></div>");
      
      $('#'+response.result.items[i].id.videoId).click(function(){     
         // wrapper.src = 'https://www.youtube.com/watch?v=' + $(this).attr("id");
         // Popcorn( wrapper );
        $('#main').hide();
        $('#video-container').show();
        addVideo(getVideoCount(),this.id);
         
      });
    }
  });
}

function showSearch() {
  $('#tabs').children().hide();
  $('#search-tab').show();
}

// $(function() {
//   getPopularVideos();
//   console.log('asdfsdf');
// });
// Search for a specified string.
function getPopularVideos() {
  console.log('called');
  var popular = ['Tiger Woods','Ernie Els','Rory McIlroy','Phil Mickelson'];
  console.log(popular);
  $('#search-list').hide();
  $('#video-showcase').show();
  $('#video-showcase').empty();
  $.each(popular, function(key, value){
    var q = value;
    console.log(q);
    var request = gapi.client.youtube.search.list({
      q: q + 'swing vision',
      part: 'snippet'
    });

    request.execute(function(response) {
      var str =  q.replace(/\s+/g, '');
      $('#video-showcase').append(
          "<hr> \
          <h3>"+q+"</h3> \
          <div class='row' id="+str+"></div>");
      for(i=0; i<4; i++){
        
        $('#'+str).append(
           "<div class='col-sm-3'> \
              <div class='thumbnail' id='" + response.result.items[i].id.videoId +"'> \
                <img src=" + response.result.items[i].snippet.thumbnails.medium.url + " > \
                <div class='caption'> \
                  <h5 style='margin:0px'>" + response.result.items[i].snippet.title + "</h5> \
                </div> \
              </div> \
            </div>");
        var videoId = response.result.items[i].id.videoId;
     

        $('#'+videoId).click(function(){
           // $('#main').hide();
           // $('#video-container').show();
           localStorage.videoId = this.id;
           window.location = "watch.php";
        //   addVideo(getVideoCount(),this.id);
           // wrapper.src = 'https://www.youtube.com/watch?v=' + $(this).attr("id");
           // Popcorn( wrapper );
           
        });
      }
    });
  });
}

function showPopular() {
  $('#video-list').children().hide();
  $('#video-showcase').show();
}

