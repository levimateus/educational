<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';

	$course = $param['course'];
	$matters = $param['matters'];
?>

<?php include PROJECT_VIEWS_DIR.'/template/navbar.php' ?>

<div class="container">
	<div class="card mt-3">
		<div class="card-body">
			<h1 class="card-title"><?php echo $course->getName(); ?></span></h1>
			<p class="card-text lead">
				<?php echo $course->getDescription(); ?>
			</p>
			<div>
				<a href="<?php buildURL('/'); ?>" class="btn btn-outline-primary">Voltar</a>
				<?php if($_SESSION['user']['role'] == PROJECT_TEACHER): ?>
					<button class="btn btn-primary"  data-toggle="modal" data-target="#newMatter">Nova Matéria</button>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="newMatter" tabindex="-1" role="dialog" aria-label="newMatterLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMatterLabel">Nova Matéria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php include PROJECT_VIEWS_DIR.'matter/create_matter.php'; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if (!empty($matters)): ?>
		<?php foreach($matters as $matter): ?>
			<div class="card mt-3">
				<div class="card-body">
					<h5 class="card-title"><?php echo $matter->getName() ?></h5>
					<p class="card-text">
						<?php echo $matter->getDescription(); ?>
					</p>
					<p><b>Professor: </b><a href="#"><?php echo $matter->getUserName(); ?></a></p>
					<a href="<?php buildURL('/matter-'.$matter->getId()); ?>" class="btn btn-outline-success">Se inscrever</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	

	
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>