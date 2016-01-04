<?php
$messageDelete = '';
if(isset($_GET['action']) && $_GET['action'] == 'delete'):
	$id = (int)$_GET['id'];
	if($user->delete($id)){
		$messageDelete = "Deletado com sucesso!";
	}

endif;
?>