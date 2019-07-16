$( document ).ready(function() {
    let form = document.forms.namedItem("ajax_form");
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // let form = document.querySelector("#form");
        // console.log(form.children[0].children[0]);

        // создать объект для формы
        var formData = new FormData(document.querySelector("#reg_form"));
        // var formData = new FormData();
        // var formData = 'login=misha&email=19mch97@gmail.com&password=qweQWE1&password_c=qweQWE1';

        // добавить к пересылке ещё пару ключ - значение
        formData.append("access", "1");
        // formData.append("name", "Aefrj");
        // console.log(formData);

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
            };

            httpRequest.open("POST", "/account/register", true);
            // httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // httpRequest.send(formData);
            httpRequest.send(formData);
    });
});
