<?php
$menu = [
    [
        'name' => 'Главная',
        'url' => '/'
    ],
    [
        'name' => 'Каталог',
        'url' => '/?page=catalog'
    ],
    [
        'name' => 'Галерея',
        'url' => '/?page=gallery'
    ],
    [
        'name' => 'Файлы',
        'url' => '/?page=files'
    ],
    [
        'name' => 'О нас',
        'url' => '/?page=about'
    ]
];

function showMenu($menu)
{
    $list = "<ul class='menu'>";
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
