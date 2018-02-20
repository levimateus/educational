<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	$matter = $param['matter'];

	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'/template/navbar.php' ?>

<div class="container">
	<div class="jumbotron mt-3">
		<h1 class="display-4"><?php echo $matter->getName(); ?></span></h1>
		<p class="lead">
			<?php echo $matter->getDescription(); ?>
		</p>
		<h5 class="display-5">
			<b>Professor: </b><a href=""><?php echo $matter->getUserName(); ?></a>
		</h5>
	</div>
	<div class="card mb-3">
		<div class="card-body">
			<form action="<?php buildURL('/topic/store'); ?>" method="post">
			<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
			<h2 class="card-title">Criar novo tópico</h2>
				<div class="form-group">
					<label for="title">Título</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Título do tópico" required="required">
				</div>
				<div class="form-group">
					<label for="content">Conteúdo</label>
					<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success float-right" value="Confirmar">
				</div>
			</form>
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-body">
			<h2 class="card-title">Título do tópico</h2>
			<h6 class="card-subtitle text-muted mb-2">26 de janeiro de 2018</h3>
			<p class="card-text">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis ipsum pretium, aliquet urna eu, pharetra arcu. Aenean vel urna nec nulla rhoncus facilisis eu porta dolor. Maecenas eleifend dui vel erat efficitur sodales. Vestibulum non molestie nulla. Praesent bibendum id nibh a semper. Curabitur non nibh lacinia, ultrices lorem sed, commodo ante. Vestibulum volutpat bibendum suscipit. Cras porta metus pulvinar, feugiat augue eget, elementum massa. Donec auctor lorem non varius venenatis. Praesent id hendrerit elit.</p>
				<p>Nulla convallis elementum pulvinar. Curabitur tristique magna nibh, vitae consequat tortor dignissim at. Pellentesque semper luctus tincidunt. Etiam non malesuada leo, nec venenatis nunc. Etiam eros ligula, auctor in justo at, auctor commodo magna. Aliquam mollis vulputate nibh lobortis mattis. Sed non mauris quis magna vulputate sodales eu ut elit. Nulla molestie finibus auctor. Nullam quis aliquam lacus.</p>
				<p>Ut ullamcorper, magna ut sagittis lacinia, magna tortor mattis tortor, ac aliquet dolor erat bibendum felis. Vestibulum auctor, orci tempor iaculis gravida, nunc turpis auctor urna, sit amet finibus justo libero non risus. Aliquam erat volutpat. Etiam in odio id urna iaculis placerat eget ac enim. Suspendisse ultrices ex erat, sed sagittis nibh fringilla vitae. Fusce gravida velit eu iaculis volutpat. Nunc malesuada urna tortor, ac bibendum arcu varius pretium. Praesent consectetur diam ac erat commodo, sit amet venenatis ante tincidunt. Integer sed iaculis massa. Donec lacinia elementum nunc, egestas posuere orci convallis vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc eleifend ipsum sed ipsum tempor, vel cursus metus placerat. Cras sed velit ut lacus tempus feugiat. Proin faucibus eros sed bibendum convallis. Maecenas eget posuere erat.</p>
				<p>Proin vitae risus in velit auctor maximus aliquet sed ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. In nec quam felis. Integer lacinia purus at iaculis lacinia. Duis tristique tempor egestas. Maecenas metus est, sollicitudin in eleifend eget, condimentum nec lacus. Nulla vel porttitor lacus. Suspendisse justo turpis, varius non rhoncus vel, maximus ut diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In vehicula tristique nunc. Maecenas malesuada efficitur tellus in volutpat.</p>
			</p>
		</div>
	</div>
</div>

<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'content' );
</script>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>