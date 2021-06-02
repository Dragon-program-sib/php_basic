<?php
$menu = [
    [
        'name' => 'Главная',
        'url' => '/'
    ],
    [
        'name' => 'О нас',
        //'url' => '/?page=about'
        'url' => '/about'
    ],
    [
        'name' => 'Каталог',
        //'url' => '/?page=catalog'
        'url' => '/catalog'
    ],
    [
        'name' => 'Галерея',
        //'url' => '/?page=gallery'
        'url' => '/gallery'
    ],
    [
        'name' => 'Файлы',
        //'url' => '/?page=files'
        'url' => '/files'
    ],
    [
        'name' => 'Новости',
        //'url' => '/?page=news'
        'url' => '/news'
    ],
    [
        'name' => 'API Test',
        //'url' => '/?page=apicatalog'
        'url' => '/apicatalog'
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