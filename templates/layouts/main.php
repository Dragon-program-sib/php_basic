<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?= uniqid(); ?>" /> <!-- Не забыть поправить после разработки. -->
</head>

<body>
    <nav>
        <?= $menu ?>
    </nav>
    <?= $content ?>
</body>

</html>