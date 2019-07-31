var backgroundSource = 'camera';
//choose sticker
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
        stickerArr = [sticker.src, sticker.width, sticker.height];
    }
    else {
        sticker.style.opacity = 1;
    }
    document.getElementById("image").innerHTML = '<img id="picture" width="25%" src="'+sticker.src+'" style="position: absolute; top: 0;" alt="The Logo">';
}

//Upload Photo from user
var fileElem = document.getElementById("uploadPhoto");

document.getElementById("uploadBtn").addEventListener("click", function() {
    if (fileElem) {
        fileElem.click();
    }
});

var userImg = document.getElementById("user");

fileElem.addEventListener("change", function() {
    var form = document.forms.namedItem("photo_form");
    var formData = new FormData(form);

    // добавить к пересылке ещё пару ключ - значение
    formData.append("act", "upload");

    // отослать
    var httpRequest;
    // if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
    // } else if (window.ActiveXObject) { // IE
    //     httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    // }

    if (!httpRequest) {
        alert('Не вышло :( Невозможно создать экземпляр класса XMLHTTP ');
        return false;
    }

    //присваивания свойству onreadystatechange имени JavaScript функции, которую вы собираетесь использовать:
    httpRequest.onreadystatechange = function(){
        if (httpRequest.readyState == 4) {
            // все в порядке, ответ получен
            if (httpRequest.status == 200) {
                // великолепно!
                if (JSON.parse(httpRequest.responseText) === 'OK') {
                    //вставка
                    var selectedFile = fileElem.files[0];
                    userImg.src = window.URL.createObjectURL(selectedFile);
                    backgroundSource = 'user';
                }
                else {
                    alert(JSON.parse(httpRequest.responseText));
                }
            } else {
                // с запросом возникли проблемы,
                // например, ответ может быть 404 (Не найдено)
                // или 500 (Внутренняя ошибка сервера)
                alert('С запросом возникла проблема.');
            }
        } else {
            // все еще не готово
            // console.log(httpRequest.readyState);
            // alert(httpRequest.readyState);
        }
    };

    httpRequest.open("POST", document.URL, true);
    // httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(formData);
});

//Use camera
document.getElementById("cameraBtn").addEventListener("click", function() {
    // Grab elements, create settings, etc.
    var video = document.getElementById('video');

    // Get access to the camera!
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
            //video.src = window.URL.createObjectURL(stream);
            video.srcObject = stream;
            video.play();
            backgroundSource = 'camera';
        });
    }
});

// Trigger photo take
document.getElementById("create").addEventListener("click", function() {
    if (backgroundSource === 'camera') {
        document.getElementById("content").innerHTML = '<canvas id="canvas" width="640" height="480">Your browser does not support the HTML5 canvas tag.</canvas>';
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, 640, 480);
    }
    else if (backgroundSource === 'user') {
        document.getElementById("image").innerHTML = '<canvas id="canvas" width="' + userImg.width +'" height="' + userImg.height +'">Your browser does not support the HTML5 canvas tag.</canvas>';
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.drawImage(document.getElementById('user'), 0, 0, userImg.width, userImg.height);
        console.log('width', userImg.width , 'height', userImg.height);

    }
    var imageDataURL = canvas.toDataURL('image/png');
    //для скачивания
    // document.querySelector('#dl-btn').href = imageDataURL;

    var data = {
        act: 'create',
        sticker: stickerArr.toString(),
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
                alert(JSON.parse(httpRequest.responseText));
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