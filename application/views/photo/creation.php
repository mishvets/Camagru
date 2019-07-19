<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <button class="btn btn-info" id="camera">New Photo</button>
            <button class="btn btn-info" id="snap">Snap Photo</button>
            <button class="btn btn-info" id="add">Add</button>
        </div>
        <div class="span10">
<!--            <div id="content">-->
<!--                <video id="video" width="640" height="480" autoplay></video>-->
<!--            </div>-->
<!--            <img id="logo" width="220" height="277" src="/images/letter-c-32.ico" alt="The Logo">-->
<!--            <div id="second_div">-->
<!--                <canvas id="canvas" width="640" height="480">Your browser does not support the HTML5 canvas tag.</canvas>-->
<!--            </div>-->
            <div id ="content" style="position:relative">
                <video id="video" width="640" height="480" autoplay style=""></video>
                <div id = 'image'>

                </div>
            </div>

        </div>
    </div>
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
    document.getElementById("add").addEventListener("click", function() {
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        var img = document.getElementById("logo");
        ctx.drawImage(img, 10, 10, 150, 180);
    });

    document.getElementById("camera").addEventListener("click", function() {
        document.getElementById("image").innerHTML = '<img id="picture" width="220" height="277" src="/images/letter-c-32.ico" style="position: absolute; top: 0;" alt="The Logo">';
    });
</script>