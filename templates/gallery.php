<?php foreach ($gallery as $item) : ?>
    <!-- as $filename - убрали -->
    <a rel="gallery" class="photo" href="image/?id<?= $item['id'] ?>"><img src="/gallery_img/small/<?= $item['filename'] ?>" width="150" /></a>
    <?= $item['likes'] ?>
<? endforeach; ?><br>
<!-- href="gallery_img/big/<?= $filename ?> - изменили -->

Загрузить изображение (jpg):
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="load" value="Загрузить">
</form>
<div class="message">
    <?= $message ?>
</div>