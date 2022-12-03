<?php
	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
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
?>

<div class="post-content">
	<h4><?php echo $dados['titulo'];?></h4>
	<span class="text-muted small"><i class="fas fa-user"></i> <?php echo $dadosU['nome'];?> - <i class="far fa-clock"></i> <?php echo $dados['data'];?>  - <i class='fas fa-eye'></i> <?php echo $dados['visitas'];?> - <i class='fas fa-thumbs-up'></i> <?php echo $dados['curtidas'];?></span>
	<div class="media">
	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">
	  <div class="media-body">
	    <?php echo substr_replace($dados['postagem'], (strlen($dados['postagem']) > 225 ? '...' : ''), 225);?>
	    <p class="button"><a href="p/<?php echo $dados['id'];?>" class="btn btn-info">Leia Mais</a></p>
	  </div>
	</div>
	</div>
<?php }}?>