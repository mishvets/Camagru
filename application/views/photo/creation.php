<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="file-handler.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" id="exampleInputFile">
                    <button class="btn btn-info" id="upload">Upload</button>
                </div>
            </form>
            <button class="btn btn-info" id="camera">Camera</button>
            <button class="btn btn-info disabled" id="create">Create</button>
            <a id="dl-btn" href="#" download="glorious_selfie.png">Save Photo</a>
            <div class="row" id="sticker_gallery">
                <?php
                $dir ='./images/'; // сохраним в переменную путь к нашей папке
//                debug(is_dir($dir));
                if(is_dir($dir)&&file_exists($dir)){ // проверим существует ли данный каталог и каталог ли это
                    $images=scandir($dir); //если все ок, то получаем список файлов из каталога.
                    for($i=3; $i < count($images);$i++){ //запускаем перебор массива в цикле
                        $image=$dir.$images[$i]; // получаем в переменную путь к файлу
//                        debug(substr($image, 1));
                        if(exif_imagetype($image)){ // проверяем является ли файл картинкой
                            echo '<figure class = "col-md-6 stikcer_figure"><img class="sticker" onclick = "chooseSticker(this)" src="'.substr($image, 1).'"height="100"></figure>'; // выводим картинку
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-8">
<!--            <div id="content">-->
<!--                <video id="video" width="640" height="480" autoplay></video>-->
<!--            </div>-->
<!--            <img id="logo" width="220" height="277" src="/images/letter-c-32.ico" alt="The Logo">-->
<!--            <div id="second_div">-->
<!--                <canvas id="canvas" width="640" height="480">Your browser does not support the HTML5 canvas tag.</canvas>-->
<!--            </div>-->
            <div id ="content" style="position:relative">
                <video id="video"  autoplay></video>
                <div id = 'image'>

                </div>
            </div>

        </div>
    </div>
</div>



<script>




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

    function chooseSticker(sticker) {
        var allStickers = document.getElementsByClassName("sticker");

        for (var i = 0; i < allStickers.length; i++) {
            if (allStickers[i].style.opacity = 0.8) {
                document.getElementById("create").classList.remove("disabled");
            }
            allStickers[i].style.opacity = 1;
        }

        if (sticker.style.opacity != 0.8) {
            sticker.style.opacity = 0.8;
        }
        else {
            sticker.style.opacity = 1;
        }
        document.getElementById("image").innerHTML = '<img id="picture" width="200" src="'+sticker.src+'" style="position: absolute; top: 0;" alt="The Logo">';
    }

    // // Elements for taking the snapshot
    // var canvas = document.getElementById('canvas');
    // var context = canvas.getContext('2d');

    // Trigger photo take
    document.getElementById("create").addEventListener("click", function() {
        document.getElementById("image").innerHTML = '<canvas id="canvas" width="640" height="480">Your browser does not support the HTML5 canvas tag.</canvas>';
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, 640, 480);
        var imageDataURL = canvas.toDataURL('image/png');
        console.log(imageDataURL);
        //для скачивания
        document.querySelector('#dl-btn').href = imageDataURL;
    });
    //
    //
    // // var btnPhoto = document.getElementById("new_btn");
    // document.getElementById("add").addEventListener("click", function() {
    //     var c = document.getElementById("canvas");
    //     var ctx = c.getContext("2d");
    //     var img = document.getElementById("logo");
    //     ctx.drawImage(img, 10, 10, 150, 180);
    // });
    //
    document.getElementById("camera").addEventListener("click", function() {
        // document.getElementById("image").innerHTML = '<img id="picture" width="220" height="277" src="/images/letter-c-32.ico" style="position: absolute; top: 0;" alt="The Logo">';
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
    });
</script>