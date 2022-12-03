<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Titulo</label>
	<input type="text" name="titulo" class="form-control"><br>

	<label>Imagem</label>
	<input type="file" name="userfile" class="form-control"><br>

	<label>Publicação</label>
	<textarea class="form-control" name="post" rows="5"></textarea><br>

	<input type="submit" value="Enviar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>
<?php
	if($_POST['env'] && $_POST['env'] == "post"){
		if($_POST['titulo'] && $_POST['post']){
			$idUser = $_SESSION['usuarioID'];
			$titulo = $_POST['titulo'];
			$post = $_POST['post'];

			$uploaddir = '../images/uploads/';
			$uploaddirN = 'images/uploads/';
			$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
			$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


			$query = $con->prepare("INSERT INTO posts (id_postador, titulo, data, postagem, imagem) VALUES (?, ?, ?, ?, ?)");
			$query->bind_param("sssss", $idUser, $titulo, $data, $post, $uploadfileN);
			$query->execute();

			if($query->affected_rows > 0 && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
				echo "<div class='alert alert-success'>Publicação enviada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao enviar a publicação!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>