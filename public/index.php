<?php

/* 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. Список файлов получить через функцию чтения директории с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
2. * на странице галереи сделать форму загрузки нового изображения, сделать проверки на тип и размер файла и сделать ресайз изображения и генерацию миниатюры, после загрузки перезагрузить сраницу, чтобы новое изображение появилось на странице. При загрузке изображения необходимо делать проверку на тип и размер файла.
3. * сделать задание на движке 4. */

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [];
$layout = 'layout';

switch ($page) {

    case 'index':
        $params['name'] = 'Админ';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        if (isset($_POST['load'])) {
            loadImage();
        }
        $layout = 'gallery';
        $params['gallery'] = getGallery(IMG_BIG);
        break;

    case 'files':
        // if ($_POST[$_FILES]) {
        //upload();
        /// header();
        //  }
        // $params['message'] = $mes[$_GET['message']];
        $params['files'] = getFiles(DOCS_DIR);
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

_log($params, 'params');


echo render($page, $params, $layout);
