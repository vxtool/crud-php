<?php
$messageCreate = '';
if(isset($_POST['cadastre'])):
	$name  = $_POST['name'];
	$email = $_POST['email'];

	$user->setNome($name);
	$user->setEmail($email);

	if($user->insert()){
		$messageCreate = "Inserido com sucesso!";
	}
endif;
?>
<?php if( empty($_GET['action']) || $_GET['action'] !== 'edit'): ?>
<?=$messageCreate?>
<form class="form-inline" method="post" action="">
	<div class="form-group">
		<div class="input-group">
			<input class="form-control" type="text" name="name" placeholder="Nome:">
		</div>
		<div class="input-group">
			<input class="form-control" type="text" name="email" placeholder="E-mail:">
		</div>
	</div>
	<input type="submit" name="cadastre" class="btn btn-primary" value="Cadastrar dados">	
</form>
<?php endif; ?>