<?php

namespace application\models;

use application\core\Model;

class Photo extends Model {

    public function createImg($post) {
        list($type, $data) = explode(';', $post['data']);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $img1 = imagecreatefromstring($data);

        list($sticker, $sticker_w, $sticker_h) = explode(',', $post['sticker']);
        list(,$sticker) = explode('images/stickers/', $sticker);
        list(,$type_sticker) = explode('.', $sticker);
        if ($type_sticker === 'png') {
            $img2 = imagecreatefrompng('images/stickers/'.$sticker);
        }
        elseif ($type_sticker === 'gif') {
            $img2 = imagecreatefromgif('images/stickers/'.$sticker);
        }
        else {
            $this->error = 'Please, choose another sticker';
            return false;
        }

        if($img1 && $img2) {
            // Высота и ширина большей картинки
            $x1 = imagesx($img1);
            $y1 = imagesy($img1);
            // Высота и ширина меньшей картинки
            $x2 = imagesx($img2);
            $y2 = imagesy($img2);
            // Копируем маленькую картинку поверх большой с заданным смещением
//            echo (json_encode($sticker_w));
            imagecopyresampled(
            // Указатели на изображения, куда и откуда нужно скопировать картинку
                $img1, $img2,
                // Координаты точки большей картинки, куда поместить левый верхний угол
                // копируемой картинки
                0, 0,
                // Координаты точки на копируемой (маленькой) картинке, начиная с которой
                // нужно копировать (левый верхний угол). Мы копируем всю картинку, по
                // этому тут нули
                0, 0,
                // Нужно сохранить пропорции. Так как высота стикера это 25% от большой, то
                // пропорционально рассчитываем y
//                $x1*0.25, $x1*0.25*$y2/$x2,
                $sticker_w, $sticker_h,
                // Ширина и высота маленькой картинки (по сути - размеры прямоугольной
                // области на маленькой картинке, из которой нужно скопировать пиксели
                // на большую). Мы копируем всю картинку, по этому тут ширина и высота
                // исходной картинки
                $x2, $y2
            );
        }
        else {
            $this->error = 'Bad image(';
            return false;
        }
//// Вывод и освобождение памяти
        imagepng($img1, 'images/results/image'.uniqid().'.png');
        imagedestroy($img1);
        imagedestroy($img2);
        return true;
    }

    public function uploadPhoto($files) {
        // Перезапишем переменные для удобства
        $filePath  = $files['upload']['tmp_name'];
        $errorCode = $files['upload']['error'];

        // Проверим на ошибки
        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

            // Массив с названиями ошибок
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
            ];

            // Зададим неизвестную ошибку
            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

            // Выведем название ошибки
            $this->error = $outputMessage;
            return false;
        }

        // Создадим ресурс FileInfo
        $fi = finfo_open(FILEINFO_MIME_TYPE);

        // Получим MIME-тип
        $mime = (string) finfo_file($fi, $filePath);

        // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
        if (strpos($mime, 'image') === false) {
            $this->error = 'Можно загружать только изображения.';
            return false;
        }

        // Результат функции запишем в переменную
        $image = getimagesize($filePath);

// Зададим ограничения для картинок
        $limitBytes  = 1024 * 1024 * 5;
        $limitWidth  = 1280;
        $limitHeight = 768;

// Проверим нужные параметры
        if (filesize($filePath) > $limitBytes) {
            $this->error = ('Размер изображения не должен превышать 5 Мбайт.');
        }
        if ($image[1] > $limitHeight) {
            $this->error = ('Высота изображения не должна превышать 768 точек.');
        }
        if ($image[0] > $limitWidth) {
            $this->error = ('Ширина изображения не должна превышать 1280 точек.');
        }
        return true;
    }
}
?>