<?php
define("ROOT", dirname(__DIR__));
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/small/");
define('DOCS_DIR', $_SERVER['DOCUMENT_ROOT'] . '/docs/');
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB */
define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', '12345_jWz_6789');
define('DB', 'php1');

/*
//TODO попробуйте сделать эти пути абсолютными
include "../engine/db.php";
include "../engine/news.php";
include "../engine/function.php";
include "../engine/gallery.php";
include "../engine/catalog.php";
include "../engine/log.php";
*/

include ROOT . "/engine/db.php";
include ROOT . "/engine/functions.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/gallery.php";
include ROOT . "/engine/classSimpleImage.php";
include ROOT . "/engine/message.php";