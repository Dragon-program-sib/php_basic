<?php
$menu = [
    [
        'link' => 'Главная',
        'href' => './index.php'
    ],
    [
        'link' => 'О нас',
        'href' => 'templates/about.php'
    ],
    [
        'link' => 'Каталог',
        'href' => 'templates/catalog.php'
    ]
];

echo "<ul>";
foreach ($menu as $item) {
    echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
}
echo "</ul>";
