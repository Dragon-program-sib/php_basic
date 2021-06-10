<h2>Файлы</h2><br>

<?php foreach ($files as $filename) : ?>
    <div>
        <b>Имя файла:</b> <a href="docs/<?= $filename ?>"><?= $filename ?></a>
    </div><br>
<?php endforeach; ?>
