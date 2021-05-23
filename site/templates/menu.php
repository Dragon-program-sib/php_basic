<?php
$menu = [
    [
        'name' => 'Главная',
        'url' => './index.php'
    ],
    [
        'name' => 'О нас',
        'url' => 'templates/about.php',
        'items' => [
            [
                'name' => 'Документы',
                'url' => 'templates/documents.php'
            ]
        ]
    ],
    [
        'name' => 'Каталог',
        'url' => 'templates/catalog.php'
    ]
];

function showMenu($menu)
{
    $list = "<ul>";
    foreach ($menu as $item) {
        $list .= "<li><a href='{$item['url']}'>{$item['name']}</a>";
        if (array_key_exists('items', $item) && is_array($item['items'])) {
            $list .= showMenu($item['items']);
        }
        $list .= "</li>";
    }
    $list .= "</ul>";

    return $list;
}

// array_key_exists - проверяет, есть ли в массиве, указанный ключ или индекс
// is_array - определяет, является ли переменная массивом

echo showMenu($menu);
