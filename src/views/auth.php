<form action="/auth" method="POST">
<div style="position: relative;   vertical-align: top;  display: inline-block;  width: 423px; text-align: left;">
        
        <div>
            <h2>Регистрация {{type}}</h2>
        </div>
		<?php if (isset($data['error'])):?>
			<p style='color:red;'>{{error}}</p>
		<?php endif; ?>
		<?php if (isset($data['info'])):?>
			<p style='color:green;'>{{info}}</p>
		<?php endif; ?>
		<div>E-mail:</div>
		<div><input name="email"></div>
		<div>Имя:</div>
		<div><input name="name"></div>
		<div>Пароль:</div>
		<div><input name="password" value="" type="password"></div>
		<div>Повторите пароль:</div>
        <div><input name="confirm_password" value="" type="password"></div>
		</div>
		<div class="signInEnter">
            <input type = "submit" value="Зарегистрироваться">
		</div>
	</div>
</form>
<div>
            	<a href = "/"> Назад </a>
</div>