<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	$users = $param['users'];

	include PROJECT_VIEWS_DIR.'/template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'/template/navbar.php';?>

<div class="container mt-3">
	<div class="tab-pane fade show" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
		<h3 class="float-left mb-4">Gerenciar Usuários:</h3>
		<a class="btn btn-primary float-right" href="<?php buildUrl('/user/register'); ?>">Novo</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Registro do Aluno</th>
					<th>Usuário</th>
					<th>Data da Cadastro</th>
					<th>Ações</th>
				</tr>
			</thead>
			<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['name']; ?></td>
				<td><?php echo $user['register_code']; ?></td>
				<td><?php echo $user['user_name']; ?></td>
				<td><?php echo $user['creation_date']; ?></td>
				<td>
					<form method="POST">
						<input type="hidden" name="id" value="<?= $user['id'] ?>">
						<input type="submit" formaction="<?php buildUrl('/user/delete'); ?>" class="btn btn-danger ml-3" value="Apagar">
						<input type="submit" class="btn btn-warning ml-3" value="Editar">
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<hr class="my-4">
	</div>
</div>


<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>