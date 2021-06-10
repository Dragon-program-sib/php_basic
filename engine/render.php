<?php

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = [])
{
    /*if (!is_null($params)) {
        extract($params);
    }*/
    extract($params);

    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Страницы {$page} не существует!");
    }

    return ob_get_clean();
}

/*function getCatalog()
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
}*/

function getFiles()
{
    return array_splice(scandir(DOCS_DIR), 2);
}
