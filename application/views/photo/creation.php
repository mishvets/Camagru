
<!--
	Ideally these elements aren't created until it's confirmed that the
	client supports video/camera, but for the sake of illustrating the
	elements involved, they are created with markup (not JavaScript)
-->
<div class = "content">
    <video id="video" width="640" height="480" autoplay></video>
    <img id="logo" width="220" height="277" src="/images/letter-c-32.ico" alt="The Logo">
    <div id="second_div">

    </div>
    <button id="snap">Snap Photo</button>
    <button id="new_btn">Add</button>
</div>
<script>
    // Grab elements, create settings, etc.
    var video = document.getElementById('video');

    // Get access to the camera!
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
            //video.src = window.URL.createObjectURL(stream);
            video.srcObject = stream;
            video.play();
        });
    }

    /* Legacy code below: getUserMedia
    else if(navigator.getUserMedia) { // Standard
        navigator.getUserMedia({ video: true }, function(stream) {
            video.src = stream;
            video.play();
        }, errBack);
    } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
        navigator.webkitGetUserMedia({ video: true }, function(stream){
            video.src = window.webkitURL.createObjectURL(stream);
            video.play();
        }, errBack);
    } else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
        navigator.mozGetUserMedia({ video: true }, function(stream){
            video.srcObject = stream;
            video.play();
        }, errBack);
    }
    */

    // Elements for taking the snapshot
    // var canvas = document.getElementById('canvas');
    // var context = canvas.getContext('2d');

    // Trigger photo take
    document.getElementById("snap").addEventListener("click", function() {
        document.getElementById("second_div").innerHTML = '<canvas id="canvas" width="640" height="480">Your browser does not support the HTML5 canvas tag.</canvas>';
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, 640, 480);
    });


    // var btnPhoto = document.getElementById("new_btn");
    document.getElementById("new_btn").addEventListener("click", function() {
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        var img = document.getElementById("logo");
        ctx.drawImage(img, 10, 10, 150, 180);
    });
</script>