<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<div class="container">
	<div class="mx-auto mt-5" style="max-width: 350px;"	>
		<img src="assets/images/application/books.png" alt="Caderno Digital" class="img-fluid"><br>
		<h2 align="center">Caderno Digital</h2>
	</div>
	<div class="card mx-auto p-4 mt-3" style="max-width: 350px;">
		<form action="<?php buildUrl('/authenticate');?>" method="post">
			<div class="form-group">
				<?php if($param == 'fail'): ?>
					<p class="text-danger text-center">Usuário ou senha incorretos</p>
				<?php endif; ?>
				<label for="login">Login:</label>
				<input type="email" name="login" id="login" class="form-control" autofocus="autofocus" placeholder="Nome de usuário" required="required">
				<label for="password">Senha:</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" required="required">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-info btn-block" value="Entrar"><br>
				<a href="<?php buildUrl('/password/forgot'); ?>">Esqueci minha senha</a>
			</div>
		</form>
		
		
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>