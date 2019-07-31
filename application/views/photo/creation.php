<div class="container">
    <div class="row">
        <div class="col-md-4">
<!--            <form action="/photo/creation" method="post" enctype="multipart/form-data">-->
<!--                <div class="form-group">-->
<!--                    <input type="file" id="exampleInputFile">-->
<!--                    <button>Загрузить</button>-->
<!--                </div>-->
<!--            </form>-->
            <form action="/photo/creation" name="photo_form" enctype="multipart/form-data">
                <input type="file" name="upload" id="uploadPhoto">
            </form>
            <button class="btn btn-info" id="cameraBtn">
                <img src="/images/icons/camera.png" height="26px">
            </button>
            <button class="btn btn-info" id="uploadBtn">Upload...</button>
            <button class="btn btn-info disabled" id="create">Create</button>
<!--            <a id="dl-btn" href="#" download="glorious_selfie.png">Save Photo</a>-->
            <div class="row" id="sticker_gallery">
                <?php
                $dir ='./images/stickers/'; // сохраним в переменную путь к нашей папке
//                debug(is_dir($dir));
                if(is_dir($dir)&&file_exists($dir)){ // проверим существует ли данный каталог и каталог ли это
                    $images=scandir($dir); //если все ок, то получаем список файлов из каталога.
                    for($i=3; $i < count($images);$i++){ //запускаем перебор массива в цикле
                        $image=$dir.$images[$i]; // получаем в переменную путь к файлу
                        if(exif_imagetype($image)){ // проверяем является ли файл картинкой
                            echo '<figure class = "col-xs-6 sticker_figure"><img class="sticker" onclick = "chooseSticker(this)" src="'.substr($image, 1).'"height="100"></figure>'; // выводим картинку
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
            <div id ="content">
                <div>
                    <img id="user" src="">
                    <video id="video" width = "100%" autoplay></video>
                </div>
                <div id = 'image'>

                </div>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript" src="/js/creation.js"></script>
