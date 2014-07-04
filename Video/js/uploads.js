// Define some variables used to remember state.
var playlistId, nextPageToken, prevPageToken;

// After the API loads, call a function to get the uploads playlist ID.
function handleAPILoaded() {
  requestUserUploadsPlaylistId();
  $('#search-button').attr('disabled', false);
  getPopularVideos();
}

// Call the Data API to retrieve the playlist ID that uniquely identifies the
// list of videos uploaded to the currently authenticated user's channel.
function requestUserUploadsPlaylistId() {
  // See https://developers.google.com/youtube/v3/docs/channels/list
  var request = gapi.client.youtube.channels.list({
    mine: true,
    part: 'contentDetails'
  });
  request.execute(function(response) {
    playlistId = response.result.items[0].contentDetails.relatedPlaylists.uploads;
    requestVideoPlaylist(playlistId);
  });
}

// Retrieve the list of videos in the specified playlist.
function requestVideoPlaylist(playlistId, pageToken) {
  $('#uploads-container').html('');
  var requestOptions = {
    playlistId: playlistId,
    part: 'snippet',
    maxResults: 10
  };
  if (pageToken) {
    requestOptions.pageToken = pageToken;
  }
  var request = gapi.client.youtube.playlistItems.list(requestOptions);
  request.execute(function(response) {
    // Only show pagination buttons if there is a pagination token for the
    // next or previous page of results.
    nextPageToken = response.result.nextPageToken;
    var nextVis = nextPageToken ? 'visible' : 'hidden';
    $('#next-button').css('visibility', nextVis);
    prevPageToken = response.result.prevPageToken
    var prevVis = prevPageToken ? 'visible' : 'hidden';
    $('#prev-button').css('visibility', prevVis);

    var playlistItems = response.result.items;
    if (playlistItems) {
      $.each(playlistItems, function(index, item) {
        displayResult(item.snippet);
      });
    } else {
      $('#uploads-container').html('Sorry you have no uploaded videos');
    }
  });
}

// Create a listing for a video.
function displayResult(videoSnippet) {
  var title = videoSnippet.title;
  var description = videoSnippet.description;
  var videoId = videoSnippet.resourceId.videoId;
  var thumbnail = videoSnippet.thumbnails.default.url;
  $('#uploads-container').append("<div class='media' id='"+videoId+"'><a class='pull-left' ><img class='media-object' src='" + thumbnail + "' alt='...'></a><div class='media-body'><h4 class='media-heading'>" + title + "</h4>"+ description +"</div></div>");
  $('#'+videoId).click(function(response){
     wrapper.src = 'https://www.youtube.com/watch?v=' + $(this).attr("id")
     var pop = Popcorn( wrapper );
  });
}

// Retrieve the next page of videos in the playlist.
function nextPage() {
  requestVideoPlaylist(playlistId, nextPageToken);
}

// Retrieve the previous page of videos in the playlist.
function previousPage() {
  requestVideoPlaylist(playlistId, prevPageToken);
}

function showUploads() {
  // $('#tabs').children().hide();
  // $('#uploads-tab').show();
  $('#video-list').children().hide();
  $('#uploads-container').show();
}

