<?php
$messageCreate = '';
if(isset($_POST['cadastrar'])):
	$nome  = $_POST['name'];
	$email = $_POST['email'];

	$usuario->setNome($nome);
	$usuario->setEmail($email);

	if($usuario->insert()){
		$messageCreate = "Inserido com sucesso!";
	}
endif;
?>
<?php if( empty($_GET['acao']) || $_GET['acao'] !== 'editar'): ?>
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
	<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">	
</form>
<?php endif; ?>