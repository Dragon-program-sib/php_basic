<?php
function render($page, $params = [], $layout = 'layout')
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = [])
{
    //$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
    extract($params);
    /* foreach ($params as $key => $value) {
        $$key = $value;
    } */
    ob_start();
    $filename = TEMPLATES_DIR . $page . ".php";

    if (file_exists($filename)) {
        include $filename;
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
