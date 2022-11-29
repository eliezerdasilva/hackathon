<main class="content">
	<?php
		renderTitle(
			'Relatório Mensal',
			'Acompanhe seu saldo de horas',
			'icofont-ui-calendar'
		);
	?>
	<div>
		<form class="mb-4" action="#" method="post">
			<div class="input-group">
				<?php if($user->is_admin): ?>
					<select name="user" class="form-control mr-2" placeholder="Selecione o usuário...">
						<option value="">Selecione o usuário</option>
						<?php
							foreach($users as $user) {
								$selected = $user->id === $selectedUserId ? 'selected' : '';
								echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
							}
						?>
					</select>
				<?php endif ?>

			</div>
		</form>

		<table class="table table-bordered table-striped table-hover">
			
			<tbody>
				
			</tbody>	
		</table>
	</div>
</main>