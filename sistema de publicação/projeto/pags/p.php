<?php
	$idPost = addslashes($explode['1']);
	$sql = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$sql->bind_param("s", $idPost);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhuma publicação encontrada!</div>";
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		atualizaVisitas($con, $dados['id'], $dados['visitas']);
?>
<div id="fullpost-content">
	<h4><?php echo $dados['titulo'];?></h4>
	<img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>" class>
	<div class="body">
		<?php echo $dados['postagem'];?>
		<hr>
		<span class="text-muted small"><i class="fas fa-user"></i> <?php echo $dadosU['nome'];?> - <i class="far fa-clock"></i> <?php echo $dados['data'];?>  - <i class='fas fa-eye'></i> <?php echo $dados['visitas'];?> - <i class='fas fa-thumbs-up' onclick="location.href='curtir/<?php echo $dados['id'];?>/<?php echo $dados['curtidas'];?>'"></i> <?php echo $dados['curtidas'];?></span>
	</div>
</div>


<?php }}?>