<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'template/navbar.php' ?>

<div class="container">
	<h1 class="mt-3">Novo Curso</h1>

	<form action="<?php buildURL('/course/store'); ?>" method="post">
		<div class="form-group">
			<label for="name">Nome <b class="text-danger">*</b></label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Informe um nome para o curso" autofocus="autofocus" required>
			<label for="course_description">Descrição <b class="text-danger">*</b></label>
			<textarea name="description" id="course_description" class="form-control" placeholder="Descrição do Curso" maxlength="5000" rows="15" style="resize: none;"></textarea>
		</div>
		<hr>
		<div class="form-group">
			<input type="submit" class="btn btn-primary float-right " value="Cadastrar" required>
			<a class="btn btn-success float-right mr-1 mb-4" href="<?php buildURL('/course/manage'); ?>">Voltar</a>
		</div>
	</form>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>