<?php

// Урок 5. Базы данных MySQL и работа с ними на уровне PHP.
/*
1. Создать галерею изображений, состоящую из двух страниц:
просмотр всех фотографий (уменьшенных копий);
просмотр конкретной фотографии (изображение оригинального размера) по её ID в базе данных.

2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
3. * На странице просмотра фотографии полного размера под картинкой должно быть указано число её просмотров.
4. * На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность - число кликов по фотографии.
5. * Сделайте это на движке.
*/

//include "../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}
$params = [
    'name' => 'Админ'
];

switch ($page) {

    case 'index':
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'files':
       // if ($_POST[$_FILES]) {
            //upload();
           /// header();
      //  }
       // $params['message'] = $mes[$_GET['message']];
        $params['files'] = getGallery();
        break;

    case 'news':
        $params['news'] = getNews();
        break;

    case 'newsone':
        $id = (int)$_GET['id'];
        $params['news'] = getOneNews($id);
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

}

_log($params, 'params');


echo render($page, $params);
