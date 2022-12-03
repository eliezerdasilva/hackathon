<?php
	$idUser = $_SESSION['usuarioID'];
	$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
	$query->bind_param("s", $idUser);
	$query->execute();
	$dados = $query->get_result()->fetch_assoc();

?>
<form method="post" id="form-publicar">
	<h4 align="center">Editar Perfil</h4>
	<hr>
	<label>Nome</label>
	<input type="text" name="nome" class="form-control" value="<?php echo $dados['nome'];?>"><br>

	<label>Usuário</label>
	<input type="text" name="usuario" class="form-control" value="<?php echo $dados['usuario'];?>"><br>

	<label>Senha</label>
	<input type="password" name="senha" class="form-control" value="<?php echo $dados['senha'];?>"><br>

	<input type="submit" value="Alterar Dados" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="alt" value="cad">
</form>
<?php
	if(isset($_POST['alt']) && $_POST['alt'] == "cad"){
		if($_POST['nome'] && $_POST['usuario'] && $_POST['senha']){
			$nome = addslashes($_POST['nome']);
			$usuario = addslashes($_POST['usuario']);
			$senha = addslashes($_POST['senha']);

			$sql = $con->prepare("UPDATE usuarios SET nome = ?, usuario = ?, senha = ? WHERE id = ?");
			$sql->bind_param("ssss", $nome, $usuario, $senha, $idUser);
			$sql->execute();

			if($sql->affected_rows > 0){
				redireciona('perfil', 'success', 2, 'Dados alterado com sucesso!');
			}else if($sql->affected_rows == 0){
				echo "<div class='alert alert-warning'>Você não atualizou nada!</div>";
			}else if($sql->affected_rows < 0){
				echo "<div class='alert alert-danger'>Erro ao atualizar os dados!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos!</div>";
		}
	}
?>