<?php
	$idPost = addslashes($explode['1']);

	$query = $con->prepare("DELETE FROM posts WHERE id = ?");
	$query->bind_param("s", $idPost);
	$query->execute();

	if($query->affected_rows > 0){
		redireciona('gerenciar-posts', false, 0, false);
	}else{
		echo "<div class='alert alert-danger'>Erro ao deletar a publicação.</div>";
	}
?>