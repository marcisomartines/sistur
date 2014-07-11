<?php
	$form=array('id' => 'form-login', 'class' => 'form-horizontal','role'=>'form');
	$usuario=array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
	$password=array('name' => 'password', 'id' => 'password', 'class' => 'form-control');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pantanal Tur - SISTUR</title>
	<link rel "stylesheet" href="<?php echo base_url();?>bootstrap/css/reset.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?=base_url()?>css/bootstrap-theme.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  	<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="width:200px; height:200px; position:absolute;
	top:50%;
	left:50%;
	margin-top:-270px;
	margin-left:-145px;">
		
		<div class="form-group">
      		<img class="col-xs-15 col-md-15 pull-center" src="<?=base_url()?>img/logo.png">	
			<?php 
				echo form_open('home/loginValidation',$form);
				echo validation_errors();
		
				echo form_label('Login:','nome');
				echo form_input($usuario);
			?>
		</div>
		<br>
		<div class="form-group">
			<?php
				echo form_label('Senha:','password');
				echo form_password($password);

				echo "<div class='form-group'>";
	    		echo "<div class='col-sm-offset-2 col-sm-10'>";
	    		echo "<br>";
		        echo '<input type="submit" class="btn btn-lg btn-success pull-right" value="Entrar">';
				echo "</div>";
				echo "</div>";
				echo form_close();
			?>
		</div>
	</div>
</body>
</html>