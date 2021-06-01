<?php
function getGallery($path)
{
    return $images = array_splice(scandir($path), 2);
}

function loadImage()
{
    //$page = header("location: /?page=gallery");
    //var_dump($_FILES);
    //die("Загружаем изображение.");
    $path_big = IMG_BIG . $_FILES["image"]["name"];
    $path_small = IMG_SMALL . $_FILES["image"]["name"];

    // Проверка на тип файла.
    $imageInfo = getimagesize($_FILES['image']['tmp_name']);
    if ($imageInfo['mime'] == 'image/gif' && $imageInfo['mime'] != 'image/jpeg' || $imageInfo['mime'] != 'image/jpeg') {
        header("Location: /?page=gallery&message=NOT_JPG");
        die();
    }

    // Проверка на размер файла.
    if ($_FILES["image"]["size"] > 1024 * 1 * 1024) {
        header("Location: /?page=gallery&message=MORE_THAN");
        die();
    }

    //Проверка расширения файла.
    /* $blacklist = array(".php", ".phtml", ".php3", ".php4", ".exe", ".txt");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['image']['name'])) {
            header("Location: /?page=gallery&message=NO_PHP");
            die();
        }
    } */

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path_big)) {
        //Ресайз.
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(150);
        $image->save($path_small);
        header("Location: /?page=gallery&message=OK");
        die();
    } else {
        header("Location: /?page=gallery&message=ERROR");
        die();
    }
}
