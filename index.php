<?php
require_once 'classes/User.php';
$user = new User();
include_once('partials/delete.php');
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	   <title>CRUD PHP</title>
	   <link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<header class="masthead">
				<h1 class="muted">CRUD PHP</h1>
			</header>
			<?php
				include_once('partials/new.php');
				include_once('partials/edit.php');
			?>
			<?=$messageDelete?>
			<table class="table table-hover">				
				<thead>
					<tr>
						<th>#</th>
						<th>Nome:</th>
						<th>E-mail:</th>
						<th>Ações:</th>
					</tr>
				</thead>				
				<?php foreach($user->findAll() as $key => $value): ?>
					<tbody>
						<tr>
							<td><?php echo $value->id; ?></td>
							<td><?php echo $value->name; ?></td>
							<td><?php echo $value->email; ?></td>
							<td>
								<a href="index.php?action=edit&amp;id=<?=$value->id?>">Editar</a>
								<a class="js-button-delete" href="index.php?action=delete&amp;id=<?=$value->id?>">Deletar</a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>

		<script type="text/javascript">
			var deleteLink = document.querySelectorAll('.js-button-delete');
			for (var i = 0, len = deleteLink.length; i < len; i++) {
				deleteLink[i].addEventListener('click', function(event) {
					if (!confirm("Deseja realmente deletar?")) {
			            event.preventDefault();
			        }
				});
			}		
		</script>
	</body>
</html>