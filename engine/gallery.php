<?php
function getGallery($path)
{
    //return  $images = array_splice(scandir($path), 2);
    return getAssocResult("SELECT * FROM `images` ORDER BY likes DESC");
}

function getOneImage($id)
{
    $id = (int)$id;
    return getAssocResult("SELECT * FROM `images` WHERE id = {$id}")[0];
}

function addLikes($id)
{
    $id = (int)$id;
    return executeQuery("UPDATE `images` SET likes = likes + 1 WHERE id = {$id}");
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
        header("Location: /gallery/?message=NOT_JPG");
        die();
    }

    // Проверка на размер файла.
    if ($_FILES["image"]["size"] > 1024 * 5 * 1024) {
        header("Location: /gallery/?message=MORE_THAN");
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
        $filename = mysqli_real_escape_string(getDb(), $_FILES['image']['name']);
        executeQuery("INSERT INTO `images` (`filename`) VALUES ('$filename')");
        //Ресайз.
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(150);
        $image->save($path_small);
        header("Location: /gallery/?message=OK");
        die();
    } else {
        header("Location: /gallery/?message=ERROR");
        die();
    }
}
