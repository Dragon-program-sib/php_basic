<h2>Отзывы</h2>

<?= $message[$_GET['message']] ?>

<!-- <form action="?action=<?= $action ?>" method="POST"> -->
<form action="/feedback/create" method="POST">
    <p>Будем рады, Вашему отзыву:</p><br>
    <input hidden type="text" name="id" value="<?= $row['id'] ?>"><br> <!-- Скрытое поле, куда приходит id отзыва. -->
    <input type="text" name="name" placeholder="Ваше имя" value="<?= $row['name'] ?>"><br>
    <input type="text" name="feedback" placeholder="Ваш отзыв" value="<?= $row['feedback'] ?>"><br>
    <input type="submit" name="ok" value="<?= $buttonText ?>"">
</form><br>

<? foreach ($feedback as $value) : ?>
    <div>
        <strong><?= $value['name'] ?></strong>: <?= $value['feedback'] ?>
        <a href="/feedback/edit&id=<?= $value['id'] ?>">[редактировать]</a>
        <a href="/feedback/delete&id=<?= $value['id'] ?>">[удалить]</a>
    </div>
    <hr>
<? endforeach; ?>
