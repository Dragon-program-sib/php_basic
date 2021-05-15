<?php
$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
<h1><?= $h1 ?></h1>
Краткая биография обо мне
Родился в 1985 году в городе Москва. Закончил в 2008 году МАИ.
На данный момент работаю ведущим инженером в крупной авиакомпании.
Поскольку я люблю авиацию, то хотел бы поделиться несколькими интересными
фотографиями на эту тему
<br><br>
Тут можете поместить картинку
<br><br>
<br><br>
<b>Просто пример жирного текста</b>
<br><br>
<?= $year ?>
</body>

</html>
