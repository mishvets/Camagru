$( document ).ready(function() {
    var form = document.forms.namedItem("ajax_form");
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        // создать объект для формы
        var formData = new FormData(document.forms.ajax_form);
        // добавить к пересылке ещё пару ключ - значение
        formData.append("patronym", "Alex");

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
                        alert(httpRequest.responseText);
                        // document.getElementById("txtHint").innerHTML = this.responseText;
                    } else {
                        // с запросом возникли проблемы,
                        // например, ответ может быть 404 (Не найдено)
                        // или 500 (Внутренняя ошибка сервера)
                        alert('С запросом возникла проблема.');
                    }
                } else {
                    // все еще не готово
                    alert(httpRequest.readyState);
                }
            };

            httpRequest.open("POST", "/account/login", true);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // httpRequest.send(formData);
            httpRequest.send(FormData);
    });
});



// //выполнение, когда все на странице прогрузилось
// $(document).ready(function () {
//
//     $('form').submit(function (event) {
//         var json;
//         //отменяем отправку форм методом пост через сервер
//         event.preventDefault();
//
//         $.ajax({
//             //атрибут формы, тип запроса
//             type: $(this).attr('method'),
//             //action формы
//             url: $(this).attr('action'),
//             dataType: "html";
//             //данные нашей формы
//             data: new FormData(this),
//             //не передаем заголовки в контенте
//             contentType: false,
//             cache: false,
//             //данные не будут преобразованы в строку
//             processData: false,
//             success: function (result) {
//                 // alert(result);
//                 json = jQuery.parseJSON((result));
//                 if (json.url) {
//                     alert(14);
//                     window.location.href = json.url;
//                 }
//                 else {
//                     alert(15);
//                     alert(json.status + ' - ' + json.message);
//                 }
//                 // alert(result);
//             },
//         });
//     });
// });



// function post_query(url, name, data) {
//
//     $.each( data.split('.'), function (key, val) {
//         alert ( val );
//     } );
//
//     // $.ajax({
//     //     url :
//     // })
// }

// $( document ).ready(function() {
//     $("#btn").click(
//         function(){
//             sendAjaxForm('ajax_form', 'http://localhost:8100/account/reg');
//             return false;
//         }
//     );
// });
//
// function sendAjaxForm(ajax_form, url) {
//     $.ajax({
//         url:     url, //url страницы (action_ajax_form.php)
//         type:     "POST", //метод отправки
//         dataType: "html", //формат данных
//         data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
//         success: function(resulte) { //Данные отправлены успешно
//             // result = $.parseJSON(response);
//             alert(resulte);
//             // $('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
//         },
//         error: function(response) { // Данные не отправлены
//             alert('Ошибка. Данные не отправлены.');
//             // $('#result_form').html('Ошибка. Данные не отправлены.');
//
//         }
//     });
// }