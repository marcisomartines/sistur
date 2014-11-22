<!DOCTYPE html>
<html>
<head>
	<title>Sign Up! Page!</title>
</head>
<body>

	<h1>Sign Up!</h1>
	<?php 
		echo form_open('home/signup_validation');
		
		echo validation_errors();

		echo '<p>Login:';
		echo form_input('nome');
		echo '</p>';

		echo '<p>Email:';
		echo form_input('email',$this->input->post('email'));
		echo '</p>';

		echo '<p>Senha:';
		echo form_password('password');
		echo '</p>';

		echo '<p>Confirme Senha';
		echo form_password('cpassword');
		echo '</p>';

		echo '<p>';
		echo form_submit('signup_submit','Cadastrar');
		echo '</p>';

		echo form_close();
		?>
</body>
</html>