<?php
$menu = [
    [
        'name' => 'Главная',
        'url' => '/'
    ],
    [
        'name' => 'О нас',
        'url' => '/about'
    ],
    [
        'name' => 'Каталог',
        'url' => '/catalog'
    ],
    [
        'name' => 'Галерея',
        'url' => '/gallery'
    ],
    [
        'name' => 'Файлы',
        'url' => '/files'
    ],
    [
        'name' => 'Новости',
        'url' => '/news'
    ],
    [
        'name' => 'Отзывы',
        'url' => '/feedback'
    ],
    [
        'name' => 'Калькулятор №1',
        'url' => '/calculator-1'
    ],
    [
        'name' => 'Калькулятор №2',
        'url' => '/calculator-2'
    ],
    [
        'name' => 'API Test',
        'url' => '/apicatalog'
    ],

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
