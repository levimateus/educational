<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<div class="container">
	<div class="card mx-auto p-4 mt-3" style="max-width: 350px;">
		<form action="<?php buildURL('/password/redefine'); ?>" method="post">
			<div class="form-group">
				<p>Você receberá o <i>link</i> de redefinição de senha em seu <i>e-mail</i></p>
				<label for="email">E-mail:</label>
				<input type="email" name="email" id="email" class="form-control" autofocus="autofocus" placeholder="E-mail" required="required">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-info btn-block" value="Confirmar"><br>
				<a href="<?php buildURL('/'); ?>">Voltar</a>
			</div>
		</form>
		
		
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>