<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'template/navbar.php'; ?>

<div class="container">
	<div class="mx-4 mt-4">
		<h1>Página de Registro de usuário</h1>
		<form action="<?php buildUrl('/user/store');?>" method="post">
			<div class="form-group">
				<label for="name">Nome <b class="text-danger">*</b></label>
				<input type="text" id="name" name="name" class="form-control" required="required">
				<label for="email">Email <b class="text-danger">*</b></label>
				<input type="text" id="email" name="user_name" class="form-control" required="required">
				<label for="password">Senha <b class="text-danger">*</b></label>
				<input type="password" id="password" name="password" class="form-control" required="required">
				<label for="register_code">Registro do Aluno <b class="text-danger">*</b></label>
				<input type="text" id="register_code" name="register_code" class="form-control" required="required">
				<label for="role">Tipo de usuário <b class="text-danger">*</b></label>
				<select id="role" name="role" class="form-control" id="role" required="required">
					<option value="0">Aluno</option>
					<option value="1">Professor</option>
					<option value="2">Administrador</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary float-right " value="Cadastrar" required>
			<a class="btn btn-success float-right mr-1 mb-4" href="<?php buildURL('/user/manage'); ?>">Voltar</a>
			</div>
			
		</form>


	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>