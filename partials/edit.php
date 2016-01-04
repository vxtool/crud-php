<?php
$messageUpdate = '';
if(isset($_POST['update'])):
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$user->setName($name);
	$user->setEmail($email);

	if($user->update($id)){
		$messageUpdate = "Atualizado com sucesso!";
	}
endif;
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'edit'):
	$id = (int)$_GET['id'];
	$result = $user->find($id);
?>
	<h3>Registro: <?=$result->id?> <a class="btn btn-primary pull-right" href="index.php">Novo usuário</a></h3>	
	<?=$messageUpdate?>	
	<form class="form-inline" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $result->id; ?>">
		<div class="form-group">
			<div class="input-group">
				<input class="form-control" type="text" name="name" value="<?php echo $result->name; ?>" placeholder="Nome:">
			</div>
			<div class="input-group">
				<input class="form-control" type="text" name="email" value="<?php echo $result->email; ?>" placeholder="E-mail:">
			</div>
		</div>
		<input type="submit" name="update" class="btn btn-primary" value="Atualizar dados">			
	</form>
<?php endif; ?>