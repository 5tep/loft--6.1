<div style="display: flex;">
    <form action="/add" method="POST" enctype="multipart/form-data"> 
        <h2>MiniBlog</h2>
        <p>Заголовок</p> 
        <input type="text" name="title">
        <p>Текст</p> 
        <textarea name="text"></textarea><br>
        <p>Можно добавить каринку:</p>
        <p>
            <input type="file" name="img" multiple accept="image/*,image/jpeg">
        </p>
        <input type="submit" value="Сохранить">
    </form>
</div>

<div style="height: 400px;  overflow: scroll;">
<?php foreach($data['posts'] as $post) : ?>
    <div class="posts">
        <h3>
            <p class="author"><?= $post['user'] ?></p>
            <p class="date"> <?= $post['date_event'] ?></p>
        </h3>
        <p class="body">
            <?= (!empty($post['img'])) ? "<img higth=150 src='data:image/png;base64,{$post['img']}'>" : '' ?>
            <?= $post['text']?>
            <?php if($data['admin']): ?>
                <form action="/admin/delpost" method="POST">
                    <input type="hidden" name="id_post" value="<?= $post['id'] ?>">
                    <input type="submit" value="Удалить">
                </form>
            <?php endif; ?>
        </p>
        <hr>
    </div>
    <br>
<?php endforeach; ?>
</div>

<div class="exit">
    <a href="/logout">Выйти</a>
    <?php if($data['admin']): ?>
        <a href="/admin">Админка</a>
    <?php endif; ?>
</div>