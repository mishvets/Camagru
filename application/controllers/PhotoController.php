<?php

namespace application\controllers;

use application\core\Controller;

class PhotoController extends Controller {

    public function creationAction() {
        if (!isset($_POST['access'])) {
            $this->view->render('Create Photo');
        }
        if (!empty($_POST)) {
//            var_dump($_POST);
//            $data = $_POST['data'];

            list($type, $data) = explode(';', $_POST['data']);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            list(,$sticker) = explode('images/stickers/', $_POST['sticker']);
//            file_put_contents('images/results/image.png', $data);
//            debug($sticker);
            $img2 = imagecreatefrompng('images/stickers/'.$sticker);
            $img1 = imagecreatefromstring($data);
//
//// Копирование
//            imagecopy($dest, $src, 0, 0, 20, 13, 80, 40);
//
//            if($img1 && $img2) {
                // Высота и ширина меньшей картинки
                $x2 = imagesx($img2);
                $y2 = imagesy($img2);
                // Копируем маленькую картинку поверх большой с заданным смещением
                imagecopyresampled(
                // Указатели на изображения, куда и откуда нужно скопировать картинку
                    $img1, $img2,
                    // Координаты точки большей картинки, куда поместить левый верхний угол
                    // копируемой картинки
                    20, 20,
                    // Координаты точки на копируемой (маленькой) картинке, начиная с которой
                    // нужно копировать (левый верхний угол). Мы копируем всю картинку, по
                    // этому тут нули
                    0, 0,
                    // Ширина и высота, которые должна получить копируемая картинка после
                    // копирования. Мы копируем картинку без искажения её исходных размеров,
                    // по этому тут ширина и высота исходной картинки
                    $x2, $y2,
                    // Ширина и высота маленькой картинки (по сути - размеры прямоугольной
                    // области на маленькой картинке, из которой нужно скопировать пиксели
                    // на большую). Мы копируем всю картинку, по этому тут ширина и высота
                    // исходной картинки
                    $x2, $y2
                );
//// Вывод и освобождение памяти
//            header('Content-Type: image/png');
            imagepng($img1, 'images/results/image.png');
//          file_put_contents('images/results/image.png', $dest);
            imagedestroy($img1);
            imagedestroy($img2);
        }
    }

}
