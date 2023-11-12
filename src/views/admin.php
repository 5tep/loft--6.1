<div id="info">
<?= $data['action']?>
</div>
Список пользователей:
<br><br>
    <?php foreach ($data['users'] as $user): ?>
        <div class="user" id="user_<?=$user['id']?>">
            <form action="/admin/edit" method = "post">
                id: <?=$user['id'];?>
                name: <input type="text" name="name" value="<?=htmlspecialchars($user['name'])?>">
                email: <input type="text" name="email" value="<?=htmlspecialchars($user['email'])?>">
                password: <input type="text" name="password">
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <br>
                <input type="submit" value="Сохранить">
            </form>
            <form action = "/admin/del" method = "post">
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <input type="submit" value="Удалить">
            </form>
        </div>
    <?php endforeach; ?>
<br><br>
<form action="/admin/add" method="post">
    Добавить пользователя
    <br><br>
    name: <input type="text" name="name"> <br>
    email: <input type="text" name="email"> <br>
    password: <input type="text" name="password">
    <input type="submit" value="Создать">


<div class="exit">
    <a href="/logout">Выйти</a>
</div>