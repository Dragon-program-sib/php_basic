<?php
function getGallery($path)
{
    return $images = array_splice(scandir($path), 2);
}

function loadImage()
{
    //var_dump($_FILES);
    //die("Загружаем изображение.");
    $path_big = IMG_BIG . $_FILES["image"]["name"];
    $path_small = IMG_SMALL . $_FILES["image"]["name"];

    // Проверки файла.
    // Проверка на тип файла.
    $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);

    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
        exit;
    }

    //Проверка на размер файла.
    if ($_FILES["userfile"]["size"] > 1024 * 1 * 1024) {
        echo ("Размер файла не больше 5 мб.");
        exit;
    }

    //Проверка расширения файла.
    $blacklist = array(".php", ".phtml", ".php3", ".php4");

    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
            echo "Загрузка php-файлов запрещена!";
            exit;
        }
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path_big)) {

        //Ресайз.
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(150);
        $image->save($path_small);
        header("location: /?page=gallery");
    } else {
        echo "Ошибка.<br>";
    }
}
