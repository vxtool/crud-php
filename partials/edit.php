<?php
$messageUpdate = '';
if(isset($_POST['atualizar'])):
	

	$id = $_POST['id'];
	$nome = $_POST['name'];
	$email = $_POST['email'];

	$usuario->setNome($nome);
	$usuario->setEmail($email);

	if($usuario->update($id)){
		$messageUpdate = "Atualizado com sucesso!";
	}
endif;
?>
<?php
if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):
	$id = (int)$_GET['id'];
	$resultado = $usuario->find($id);
?>
	<h3>Registro: <?=$resultado->id?> <a class="btn btn-primary pull-right" href="index.php">Novo usuário</a></h3>	
	<?=$messageUpdate?>	
	<form class="form-inline" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
		<div class="form-group">
			<div class="input-group">
				<input class="form-control" type="text" name="name" value="<?php echo $resultado->name; ?>" placeholder="Nome:">
			</div>
			<div class="input-group">
				<input class="form-control" type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:">
			</div>
		</div>
		<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">			
	</form>
<?php endif; ?>