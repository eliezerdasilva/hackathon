<?php

include("conn.php");

//recebe os dados
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'Cep', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'Rua', FILTER_SANITIZE_STRING);
$n = filter_input(INPUT_POST, 'N-casa', FILTER_SANITIZE_STRING);
$data_emprestimo = filter_input(INPUT_POST, 'data_emprestimo', FILTER_SANITIZE_STRING);
$data_entrega = filter_input(INPUT_POST, 'data_entrega', FILTER_SANITIZE_STRING);
$situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);


//verifica se os campos não foram preenchidos
if(empty($nome) || empty($cpf) || empty($cep) || empty($rua) || empty($n) || empty($data_emprestimo)
|| empty($data_entrega) || empty($situacao)){

	echo 2;
	
}else{

	//insere o funcionario no banco de dados
	$smtp = $conn->prepare("INSERT INTO funcionarios(id, tb_nome, tb_cpf, cep,rua,n,tb_data_emprestimo,tb_data_entrega,
	situacao) VALUES (:nome, :cpf,:cep,:rua,:N-casa,:data_emprestimo,:data_entrega,:situacao)");
	$smtp->bindparam(":nome", $nome);
	$smtp->bindparam(":cpf", $cpf);
	$smtp->bindparam(":cep", $cep);
	$smtp->bindparam(":rua", $rua);
	$smtp->bindparam(":N-casa", $n);
	$smtp->bindparam(":data_emprestimo", $data_emprestimo);
	$smtp->bindparam(":data_entrega", $data_entrega);
	$smtp->bindparam(":situacao", $situacao);

	if($smtp->execute()){
		echo 1;
	}else{
		echo 0;
	}
}