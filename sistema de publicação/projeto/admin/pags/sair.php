<?php
	if(session_destroy()){
		redireciona('login', 'success', 2, 'Deslogando...');
	}else{
		echo "Erro ao deslogar.";
	}
?>