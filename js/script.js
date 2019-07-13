//выполнение, когда все на странице прогрузилось
$(document).ready(function () {

    $('form').submit(function (event) {
        //отменяем отправку форм методом пост через сервер
        event.preventDefault();

        $.ajax({
            //атрибут формы, тип запроса
            type: $(this).attr('method'),
            //action формы
            url: $(this).attr('action'),
            //данные нашей формы
            data: new FormData(this),
            //не передаем заголовки в контенте
            contentType: false,
            cache: false,
            //данные не будут преобразованы в строку
            processData: false,
            success: function (result) {
                alert(result);
            },
        });
    });
});
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