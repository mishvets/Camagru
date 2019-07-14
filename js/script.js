

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

/* Article FructCode.com */
$( document ).ready(function() {
    $("#btn").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
            return false;
        }
    );
});