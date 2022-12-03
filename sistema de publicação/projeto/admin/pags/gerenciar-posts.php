<div id="form-publicar">
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Titulo</th>
			<th>Data</th>
			<th>Gerenciar</th>
		</tr>

		<?php
			$query = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		?>
		<tr>
			<td><?php echo $dados['id'];?></td>
			<td><?php echo $dados['titulo'];?></td>
			<td class="small"><?php echo $dados['data'];?></td>
			<td><button id="dropdownbtn" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" arial-expanded="false">Gerenciar</button>
			<div class="dropdown-menu" aria-labelledby="dropdownbtn">
				<a href="p/<?php echo $dados['id'];?>" class="dropdown-item">Ver Publicação</a>
				<a href="admin/editar-post/<?php echo $dados['id'];?>" class="dropdown-item">Editar Publicação</a>
				<a href="admin/deletar-post/<?php echo $dados['id'];?>" class="dropdown-item">Deletar Publicação</a>
			</div>

			</td>
		</tr>
	<?php }}?>

	</table>
</div>