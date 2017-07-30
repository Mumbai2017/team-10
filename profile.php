<!DOCTYPE html>

<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

  /***** START BOILERPLATE CODE: Load client library, authorize user. *****/

  // Global variables for GoogleAuth object, auth status.
  var GoogleAuth;
  var commentlist

  /**
   * Load the API's client and auth2 modules.
   * Call the initClient function after the modules load.
   */
  function handleClientLoad() {
    gapi.load('client:auth2', initClient);
  }

  function initClient() {
    // Initialize the gapi.client object, which app uses to make API requests.
    // Get API key and client ID from API Console.
    // 'scope' field specifies space-delimited list of access scopes

    gapi.client.init({
        'clientId': '685537312480-oko2kmm5i9ntfqc3u0tet8ipnhceen6l.apps.googleusercontent.com',
        'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
        'scope': 'https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner'
    }).then(function () {
      GoogleAuth = gapi.auth2.getAuthInstance();

      // Listen for sign-in state changes.
      GoogleAuth.isSignedIn.listen(updateSigninStatus);

      // Handle initial sign-in state. (Determine if user is already signed in.)
      setSigninStatus();

      // Call handleAuthClick function when user clicks on "Authorize" button.
      $('#execute-request-button').click(function() {
        handleAuthClick(event);
      }); 
    });
  }

  function handleAuthClick(event) {
    // Sign user in after click on auth button.
    GoogleAuth.signIn();
  }

  function setSigninStatus() {
    var user = GoogleAuth.currentUser.get();
    isAuthorized = user.hasGrantedScopes('https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner');
    // Toggle button text and displayed statement based on current auth status.
    if (isAuthorized) {
      defineRequest();
    }
  }

  function updateSigninStatus(isSignedIn) {
    setSigninStatus();
  }

  function createResource(properties) {
    var resource = {};
    var normalizedProps = properties;
    for (var p in properties) {
      var value = properties[p];
      if (p && p.substr(-2, 2) == '[]') {
        var adjustedName = p.replace('[]', '');
        if (value) {
          normalizedProps[adjustedName] = value.split(',');
        }
        delete normalizedProps[p];
      }
    }
    for (var p in normalizedProps) {
      // Leave properties that don't have values out of inserted resource.
      if (normalizedProps.hasOwnProperty(p) && normalizedProps[p]) {
        var propArray = p.split('.');
        var ref = resource;
        for (var pa = 0; pa < propArray.length; pa++) {
          var key = propArray[pa];
          if (pa == propArray.length - 1) {
            ref[key] = normalizedProps[p];
          } else {
            ref = ref[key] = ref[key] || {};
          }
        }
      };
    }
    return resource;
  }

  function removeEmptyParams(params) {
    for (var p in params) {
      if (!params[p] || params[p] == 'undefined') {
        delete params[p];
      }
    }
    return params;
  }

  function executeRequest(request) {
    request.execute(function(response) {
      console.log(response);
      commentlist = response;
      try{
      	console.log(commentlist['kind'])
      	if((commentlist['kind']).toString()=="youtube#commentThreadListResponse")
      	loadComments(commentlist)
      }
      catch(err){

      }
      
    });
  }

  function buildApiRequest(requestMethod, path, params, properties) {
    params = removeEmptyParams(params);
    var request;
    if (properties) {
      var resource = createResource(properties);
      request = gapi.client.request({
          'body': resource,
          'method': requestMethod,
          'path': path,
          'params': params
      });
    } else {
      request = gapi.client.request({
          'method': requestMethod,
          'path': path,
          'params': params
      });
    }
    executeRequest(request);
  }

  /***** END BOILERPLATE CODE *****/

  
  function defineRequest() {
    // See full sample for buildApiRequest() code, which is not 
// specific to a particular youtube or youtube method.


  

  }

  function loadComments(commentlist){
  	      $('#commentbox').empty();


    for(i=0;i<commentlist['items'].length;i++){
      comm = commentlist['items'][i]['snippet']['topLevelComment']['snippet']['textOriginal']
      commenter = commentlist['items'][i]['snippet']['topLevelComment']['snippet']['authorDisplayName']
      name = "<b>"+commenter+"</b>"
      comment = "<p>"+comm+"</p>"
      $('#commentbox').append("<div id="+i+">"+name+comment+"</div>");





    }
   

  }

    // See full sample for buildApiRequest() code, which is not 
// specific to a particular youtube or youtube method.
$(window).load(function(){

function postComment(comment,video){
	 buildApiRequest('POST',
                '/youtube/v3/commentThreads',
                {'part': 'snippet'},
                {'snippet.channelId': '0-90-i',
                 'snippet.videoId': 'M7lc1UVf-VE',
                 'snippet.topLevelComment.snippet.textOriginal': comment
      });


}

$(".submitcomment").click(function(){
	var x=$(this).siblings("#comment").val();

	postComment(x,"sdfg");

console.log("WTF");


});


});




  

</script>
<style type="text/css">
body{
	background-color: #eee;
}
.jumbotron{
	padding: 20px;
	border-radius: 5px;
	background-color: white;
  
}
.{

}
</style>
</head>

<body>
	<div style="margin: 20px auto; width: 100%; max-width: 300px">
		<div class="form-group">
		  <label for="sel1">Select list:</label>
		  <select class="form-control" id="sel1">
		    <option>Lesson 1</option>
		    <option>Lesson 2</option>
		    <option>Lesson 3</option>
		    <option>Lesson 4</option>
		  </select>
		</div>
	</div>

	<div style="width:100%; display: flex; flex-wrap: wrap">
		<div id="videobox" style="width: 60%">
			<div style>
				<div style="text-align: center">
					<p id="display"></p>
	    			<div id="player"></div>

			    	<div style="width: 100%; display: flex; flex-wrap:wrap; max-width: 640px; margin: 0px auto">
		    			<div style="width: 32%;"><button style="width:100%" id="M7lc1UVf-VE" class="commentbutton">Show Comments</button></div>
		    			<div style="width: 32%; margin-left: 2%; margin-right: 2%"><button style="width:100%" class="recordbutton">Record Audio Comment</button></div>
		    			<div style="width: 32%;"><button style="width: 100%" class="stopbutton">Stop Recording</button></div>
			    	</div>
				</div>
			</div>
			<div id="l2" class="row">
								<h3>Lesson 2</h3>

				<div id="col-l1" class="col-md-12">
					    <div id="player"></div>

					


				</div>
			</div>
			<div id="l3" class="row">
								<h3>Lesson 3</h3>

				<div id="col-l1" class="col-md-12">
					    <div id="player"></div>

					


				</div>
			</div>
			<div id="l4" class="row">
								<h3>Lesson 4</h3>

				<div id="col-l1" class="col-md-12">
					    <div id="player"></div>

					


				</div>
			</div>

			</div>
		


		<div id="commentbox1" style="width: 40%">
			<div>
				<div>
					<div class="form-group">
					  <label for="comment" style="font-size: 20px; margin-bottom: 20px">Comment:</label>
					  <textarea class="form-control" rows="5" id="comment" style="margin-bottom: 10px"></textarea>
					  <button class="submitcomment">Submit Comment</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="commentbox" class="col-md-12">
				</div>


			</div>
		</div>
	</div>

	</div>



	<script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
display = document.getElementById('display');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      var timer, timeSpent = []
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',

          videoId: 'M7lc1UVf-VE',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }
      function record(){
	timeSpent[ parseInt(player.getCurrentTime()) ] = true;
	showPercentage();
}



      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
      	
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
      window.setInterval(function(){
      	      var p = player.getCurrentTime()
      	      console.log(p)
      	      highlight(p);


  /// call your function here
}, 2000);

   function highlight(p){
   	var v =$("#commentbox").children();
   	var t = v.length
   	var q=player.getDuration()
   	 var m = (p*t/q);

   	 console.log(m);
   	 m=parseInt(m)
   	 m=m.toString()
   	 $( "#commentbox" ).children().css({"background-color":"white","padding":"20px"});

   	 $('#'+m).css("background-color","#ffa300");


   }   

    </script>

<script async defer src="https://apis.google.com/js/api.js" 
        onload="this.onload=function(){};handleClientLoad()" 
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>
<script>
$(document).ready(function(){
	$("#l2").hide()
	$("#l3").hide()
	$("#l4").hide()
})
$("#sel1").change(function(){
	var lesson = $('#sel1').find(":selected").text();
	if(lesson=="Lesson 1"){
		$("#l1").show()
		$("#l2").hide()
		$("#l3").hide()
		$("#l4").hide()

	}
	else if(lesson=="Lesson 2"){
		$("#l2").show()
		$("#l1").hide()
		$("#l3").hide()
		$("#l4").hide()

	}
	else if(lesson=="Lesson 3"){
		$("#l3").show()
		$("#l2").hide()
		$("#l1").hide()
		$("#l4").hide()

	}
	else if(lesson=="Lesson 4"){
		$("#l4").show()
		$("#l2").hide()
		$("#l3").hide()
		$("#l1").hide()

	}

});
$(".commentbutton").click(function(){
	var id = $(this).attr('id');
	console.log(id);
	  buildApiRequest('GET',
                '/youtube/v3/commentThreads',
                {'part': 'snippet,replies',
                 'videoId': id});
	  console.log("Hell yeah")


});




</script>
<script type="text/javascript">
function createAudioElement(blobUrl) {  
    const downloadEl = document.createElement('a');
    downloadEl.style = 'display: block';
    downloadEl.innerHTML = 'download';
    downloadEl.download = 'audio.webm';
    downloadEl.href = blobUrl;
    const audioEl = document.createElement('audio');
    audioEl.controls = true;
    const sourceEl = document.createElement('source');
    sourceEl.src = blobUrl;
    sourceEl.type = 'audio/webm';
    audioEl.appendChild(sourceEl);
    document.body.appendChild(audioEl);
    document.body.appendChild(downloadEl);
}

// request permission to access audio stream
navigator.mediaDevices.getUserMedia({ audio: true }).then(stream => {  
    // store streaming data chunks in array
    const chunks = [];
    // create media recorder instance to initialize recording
    const recorder = new MediaRecorder(stream);
    // function to be called when data is received
    recorder.ondataavailable = e => {
      // add stream data to chunks
      chunks.push(e.data);
      // if recorder is 'inactive' then recording has finished
      if (recorder.state == 'inactive') {
          // convert stream data chunks to a 'webm' audio format as a blob
          const blob = new Blob(chunks, { type: 'audio/webm' });
          // convert blob to URL so it can be assigned to a audio src attribute
          createAudioElement(URL.createObjectURL(blob));
      }
    };
    $(".recordbutton").click(function(){
    recorder.start(1000);


        // this will trigger one final 'ondataavailable' event and set recorder state to 'inactive'
        $(".stopbutton").click(function(){
        	recorder.stop();


        })
        


    })
    // setTimeout to stop recording after 5 seconds
    
  }).catch(console.error);
</script>
</body>
</html>
