<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include 'template/header.php';
?>

<div class="container">
	<div class="mx-4 mt-4">
		<h1>Página de Registro de usuário</h1>
		<form action="create_user" method="post">
			<div class="form-group">
				<label for="">Nome</label>
				<input type="text" name="name" class="form-control">
				<label for="">Email</label>
				<input type="text" name="user_name" class="form-control">
				<label for="">Senha</label>
				<input type="password" name="password" class="form-control">
				<label for="">Registro do Aluno</label>
				<input type="text" name="register_code" class="form-control">
				<label for="">Tipo de usuário</label>
				<select name="role" class="form-control" id="role">
					<option value="0">Aluno</option>
					<option value="1">Professor</option>
					<option value="2">Administrador</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary">
			</div>
			
		</form>


	</div>
</div>

<?php include 'template/footer.php';?>