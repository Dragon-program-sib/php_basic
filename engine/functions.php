<?php
function prepareVariables($page)
{
    //$params = [];
    //$layout = 'layout';
    $params['layout'] = 'main';

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
            //$layout = 'gallery';
            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery(IMG_BIG);
            break;

        case 'image':
            $params['layout'] = 'gallery_image';
            if (addLikes($_GET['id'])) {
                $params['$message'] = "Такого изображения нет в БД!";
            };
            //addLikes($_GET['id']);
            $params['image'] = getOneImage($_GET['id']);
            break;

        case 'files':
            // if ($_POST[$_FILES]) {
            //upload();
            /// header();
            //  }
            // $params['message'] = $mes[$_GET['message']];
            $params['files'] = getFiles(DOCS_DIR);
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
    return $params;
}

/* Функция, возвращает текст шаблона $page с подстановкой переменных
из массива $params, содержимое шабона $page подставляется в
переменную $content главного шаблона layout для всех страниц. */
function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
        'menu' => renderTemplate('menu'),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = [])
{

    //$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
    //extract($params);
    /* foreach ($params as $key => $value) {
        $$key = $value;
    } */
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }
    
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Страницы {$page} не существует!");
    }

    return ob_get_clean();
}

function getCatalog()
{
    return [
        [
            'name' => 'Пицца',
            'price' => 24
        ],
        [
            'name' => 'Чай',
            'price' => 1
        ],
        [
            'name' => 'Яблоко',
            'price' => 12
        ]
    ];
}

function getFiles()
{
    return array_splice(scandir(DOCS_DIR), 2);
}
