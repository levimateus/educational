<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include 'template/header.php';
?>

<div class="container">
	<div class="mx-auto mt-5" style="max-width: 350px;"	>
		<img src="assets/images/application/books.png" alt="Caderno Digital" class="img-fluid"><br>
		<h2 align="center">Caderno Digital</h2>
	</div>
	<div class="card mx-auto p-4 mt-3" style="max-width: 350px;">
		<form action="./authenticate" method="post">
			<div class="form-group">
				<label for="">Login:</label>
				<input type="text" name="login" class="form-control" autofocus="autofocus" placeholder="Nome de usuário">
				<label for="">Senha:</label>
				<input type="password" name="password" class="form-control" placeholder="Digite sua senha">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-info btn-block" value="Entrar"><br>
				<a href="">Esqueci minha senha</a>
			</div>
		</form>
		
		
	</div>
</div>

<?php include 'template/footer.php';?>