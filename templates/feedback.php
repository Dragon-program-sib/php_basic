<h2>Отзывы</h2>

<!-- <form action="?action=<?= $action ?>" method="POST"> -->
<form class="form" action="/feedback/<?= $action ?>/" method="post">
    <p>Будем рады, Вашему отзыву:</p><br>
    <div class="message">
        <?= $message ?>
    </div>
    <!-- Скрытое поле, куда приходит id отзыва. -->
    <input hidden type="text" name="id_feedback" value="<?= $id_feed ?>"><br>
    <input required class="form__input" type="text" name="name" placeholder="Ваше имя" value="<?= $name ?>"><br>
    <textarea required class="form__textarea" type="text" cols="20" name="feedback" placeholder="Ваш отзыв" value="<?= $text ?>"></textarea><br>
    <!-- <input class="form__input" type="text" name="feedback" placeholder="Ваш отзыв" value="<?= $text ?>"><br> -->
    <input class="form__button" type="submit" value="<?= $buttonText ?>">
    <input class="form__button" type="reset" value="Отменить">
</form><br>

<? foreach ($feedback as $value) : ?>
    <div>
        <strong><?= $value['name'] ?></strong>: <?= $value['feedback'] ?>
        <a href="/feedback/edit/?id_feed=<?= $value['id'] ?>">[редактировать]</a>
        <a href="/feedback/delete/?id_feed=<?= $value['id'] ?>">[удалить]</a>
    </div>
    <hr>
<? endforeach; ?>
