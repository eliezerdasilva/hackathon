<div class="admin-form">
	<div class="admin-form-title">Logue-se</div>
	<div class="admin-form-body">
		<form method="POST">
			<input type="text" name="usuario" class="form-control" placeholder="Usuário"><br>
			<input type="password" name="senha" class="form-control" placeholder="**********"><br>
			<input type="submit" value="Entrar" class="btn btn-outline-primary btn-lg btn-block">
			<input type="hidden" name="env" value="log">
		</form>
	</div>
</div>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "log"){
		if($_POST['usuario'] && $_POST['senha']){
			$usuario = addslashes($_POST['usuario']);
			$senha = addslashes($_POST['senha']);

			$sql = $con->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
			$sql->bind_param("ss", $usuario, $senha);
			$sql->execute();
			$get = $sql->get_result();
			$total = $get->num_rows;
			$dados = $get->fetch_assoc();

			if($total > 0){
				$_SESSION['usuarioID'] = $dados['id'];
				$_SESSION['usuarioUsuario'] = $dados['usuario'];
				$_SESSION['usuarioNome'] = $dados['nome'];


				redireciona('inicio', 'success', 2, 'Logado com sucesso!');
			}else{
				echo "<div class='alert alert-danger'>Usuário ou senha inválido.</div>";
			}
		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>