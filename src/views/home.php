<?php 
	ob_end_clean();
	$title = 'Caderno Digital';
	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'template/navbar.php' ?>

<div class="container">
	
	<?php foreach($param['courses'] as $course): ?>
		<div class="card mt-4 w-100">
			<div class="card-body">
				<h5 class="card-title"><?php echo $course['name']; ?></h5>
				<p class="card-text">
					<?php echo $course['description']; ?>
				</p>
				<a href="<?php buildUrl('/course-'.$course['id']); ?>" class="btn btn-outline-success">Entrar</a>
			</div>
		</div>
	<?php endforeach; ?>
	
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>