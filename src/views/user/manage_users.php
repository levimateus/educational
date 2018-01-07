<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
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
			<?php foreach ($param['users'] as $course):?>
			<tr>
				<td><?php echo $course['id']; ?></td>
				<td><?php echo $course['name']; ?></td>
				<td><?php echo $course['register_code']; ?></td>
				<td><?php echo $course['user_name']; ?></td>
				<td><?php echo $course['creation_date']; ?></td>
				<td>
					<button class="btn btn-warning">Editar</button>
					<button class="btn btn-danger ml-3">Excluir</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<hr class="my-4">
	</div>
</div>


<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>