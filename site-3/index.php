<?php
$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$year = date("Y");

$content = file_get_contents("main.html");
$content = str_replace("{{ TITLE }}", $title, $content);
$content = str_replace("{{ H1 }}", $h1, $content);
$content = str_replace("{{ YEAR }}", $year, $content);

echo $content;
