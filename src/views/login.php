<form action="/login" method="POST">
<div style="position: relative;   vertical-align: top;  display: inline-block;  width: 423px; text-align: left;">
        
        <div>
            <h2>Вход</h2>
        </div>
		<?php if (isset($data['error'])):?>
			<p style='color:red;'><?= $data['error']?></p>
		<?php endif; ?>
		<?php if (isset($data['info'])):?>
			<p style='color:green;'><?= $data['info']?></p>
		<?php endif; ?>
		<div>E-mail:</div>
		<div><input name="email"></div>
		<div>Пароль:</div>
		<div><input name="password" value="" type="password"></div>
		</div>
		<div class="signInEnter">
            <input type = "submit" value="Войти">
		</div>
</div>
</form>
<div>
            	<a href = "/registration"> Зарегистрироваться </a>
</div>