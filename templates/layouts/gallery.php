<?php
include ROOT . "/engine/message.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?=uniqid();?>" /> <!-- Не забыть поправить после разработки. -->
    <script type="text/javascript" src="/scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        });
    </script>

</head>

<body>
    <nav>
        <?= $menu ?>
    </nav>
    
    <h2>Галерея</h2>
    <div id="main">
        <div class="post_title">
        </div>
        <div class="gallery">
            <?= $content ?>
        </div>
        Загрузить изображение (jpg):
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="load" value="Загрузить">
        </form>
        <div class="message">
            <?= $message ?>
        </div>
        
</body>

</html>
