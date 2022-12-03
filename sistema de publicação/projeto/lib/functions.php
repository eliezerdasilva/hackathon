<?php
	
	function carrega_pagina($con, $data, $isAdmin){
		
		if($isAdmin == true){
			$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'login';
			$explode = explode('/', $url);
			protegePagina($explode['0'], true);
		}else{
			$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
		}

		$explode = explode('/', $url);
		$dir = "pags/";
		$ext = ".php";
		

		
		if(file_exists($dir.$explode['0'].$ext)){
			require_once($dir.$explode['0'].$ext);
		}else{
			echo "<div class='alert alert-danger'>Página não encontrada</div>";
		}
	}

	function gera_titulo($titulo, $isAdmin, $con){
		if($isAdmin == true){
			$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'login';
		}else{
			$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
		}
		
		$explode = explode('/', $url);

		switch($explode['0']){
			case 'inicio':
				$titulo = "Inicio - ".$titulo;
				break;

			case 'login':
				$titulo = "Login - ".$titulo;
				break;

			case 'perfil':
				$titulo = "Perfil - ".$titulo;
				break;

			case 'editar-postagem':
				$titulo = "Editar Publicação - ".$titulo;
				break;

			case 'publicar':
				$titulo = "Publicar - ".$titulo;
				break;

			case 'deletar-postagem':
				$titulo = "Deletar Publicação - ".$titulo;
				break;

			case 'p':
				$sql = $con->prepare("SELECT * FROM posts WHERE id = ?");
				$sql->bind_param("s", $explode['1']);
				$sql->execute();
				$dados = $sql->get_result()->fetch_assoc();
				$titulo = $dados['titulo'];
			break;
		}
		return $titulo;
	}


	function protegePagina($explode, $isAdmin){
		$paginas_protegidas = array("inicio", "publicar", "gerenciar-posts", "editar-post", "deletar-post", "perfil");

		if(!isset($_SESSION['usuarioID']) && in_array($explode, $paginas_protegidas) && $isAdmin == true){
			redireciona('login', false, 0, false);
			exit();
		}

		if(isset($_SESSION['usuarioID']) && $explode == "login" && $isAdmin == true){
			redireciona('inicio', false, 0, false);
			exit();
		}
		
	}

	function redireciona($url, $tipo, $tempo, $mensagem){
		echo "<meta http-equiv='refresh' content='{$tempo};URL=admin/{$url}'>";

		if($tipo != false){
			echo "<div class='alert alert-{$tipo}'>{$mensagem}</div>";
		}

	}

	function atualizaVisitas($con, $idPost, $totalVisitas){
		$visitasAtualizadas = ($totalVisitas) +1;

		$query = $con->prepare("UPDATE posts SET visitas = ? WHERE id = ?");
		$query->bind_param("ss", $visitasAtualizadas, $idPost);
		$query->execute();
		if($query->affected_rows > 0){
			return true;
		}else{
			return false;
		}
	}

	function curtir($con, $idPost, $totalCurtidas){
		$curtidasAtualizadas = ($totalCurtidas) +1;

		$query = $con->prepare("UPDATE posts SET curtidas = ? WHERE id = ?");
		$query->bind_param("ss", $curtidasAtualizadas, $idPost);
		$query->execute();
		if($query->affected_rows > 0){
			echo "<script>window.history.back(-1);</script>";
		}else{
			echo "<script>window.history.back(-1);</script>";
		}
	}
?>