



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
var stickerArr;

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
        stickerArr = sticker.src;
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
    // console.log(imageDataURL);
    //для скачивания
    document.querySelector('#dl-btn').href = imageDataURL;

    var data = {
        access: '1',
        sticker: stickerArr,
        data: imageDataURL
    };

    var boundary = String(Math.random()).slice(2);
    var boundaryMiddle = '--' + boundary + '\r\n';
    var boundaryLast = '--' + boundary + '--\r\n'

    var body = ['\r\n'];
    for (var key in data) {
        // добавление поля
        body.push('Content-Disposition: form-data; name="' + key + '"\r\n\r\n' + data[key] + '\r\n');
    }

    body = body.join(boundaryMiddle) + boundaryLast;

    // Тело запроса готово, отправляем

    var httpRequest = new XMLHttpRequest();
    httpRequest.open('POST',  document.URL, true);

    httpRequest.setRequestHeader('Content-Type', 'multipart/form-data; boundary=' + boundary);

    httpRequest.onreadystatechange = function() {
        if (httpRequest.readyState == 4) {
                    // все в порядке, ответ получен
                    if (httpRequest.status == 200) {
                        // великолепно!
                        alert(httpRequest.responseText);
                    } else {
                        // с запросом возникли проблемы,
                        // например, ответ может быть 404 (Не найдено)
                        // или 500 (Внутренняя ошибка сервера)
                        alert('С запросом возникла проблема.');
                    }
                } else {
                    // все еще не готово
                    // alert(httpRequest.readyState);
                }
    }
        httpRequest.send(body);

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