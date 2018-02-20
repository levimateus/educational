<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'/template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'/template/navbar.php';?>

<div class="container mt-3">
	<div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
		<h3 class="float-left mb-4">Gerenciar Cursos:</h3>
		<a class="btn btn-primary float-right" href="<?php buildUrl('/course/register'); ?>">Novo</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>Ações</th>
				</tr>
			</thead>
			<?php foreach ($param['courses'] as $course):?>
			<tr>
				<td><?php echo $course['id']; ?></td>
				<td><a href="<?php buildUrl('/course-'.$course['id']); ?>"><?php echo $course['name']; ?></a></td>
				<td>
					<!-- <button class="btn btn-warning">Editar</button> -->
					<!-- <button class="btn btn-danger ml-3">Excluir</button> -->
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<hr class="my-4">
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>