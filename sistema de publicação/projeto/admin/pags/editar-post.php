<?php
	$idPost = addslashes($explode['1']);
	$query = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$query->bind_param("s", $idPost);
	$query->execute();
	$get = $query->get_result();
	$dados = $get->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Titulo</label>
	<input type="text" name="titulo" class="form-control" value="<?php echo $dados['titulo'];?>"><br>

	<label>Publicação</label>
	<textarea class="form-control" name="post" rows="5"><?php echo $dados['postagem'];?></textarea><br>

	<input type="submit" value="Alterar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['titulo'] && $_POST['post']){
			$titulo = $_POST['titulo'];
			$post = $_POST['post'];

			$sql = $con->prepare("UPDATE posts SET titulo = ?, postagem = ? WHERE id = ?");
			$sql->bind_param("sss", $titulo, $post, $idPost);
			$sql->execute();

			if($sql->affected_rows > 0){
				echo "<div class='alert alert-success'>Publicação alterada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao alterar a publicação!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>