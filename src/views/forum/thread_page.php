<?php 
	ob_end_clean();
	$title  = 'Caderno Digital';
	$matter = $param['matter'];
	$topics = $param['topics']; 
	$course = $param['course'];
	$thread  = $param['thread'];
	$answers  = $param['answers'];

	include PROJECT_VIEWS_DIR.'template/header.php';
?>
<?php include PROJECT_VIEWS_DIR.'template/navbar.php'; ?>

<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


<!-- CONTAINER -->
<div class="container">

	<!-- ROW -->
	<div class="row">

		<!-- COLUMN -->
		<div class="col-12">

			<!-- MATTER TITLE AND DESCRIPTION -->
			<?php include PROJECT_VIEWS_DIR.'/matter/header.php'; ?>

			<!-- BREADCRUMB -->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php buildURL('/');?>">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php buildURL('/course-'.$matter->getCourseId());?>">
							<?=$course->getName()?>
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						<a href="<?php buildURL('/matter-'.$matter->getId());?>">
							<?= $matter->getName() ?>
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						<a href="<?php buildURL('/forum/matter-'.$matter->getId());?>">
							Fórum
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						<?= $thread->getTitle() ?>
					</li>
				</ol>
			</nav>
		</div>
	</div>

	<!-- ROW -->
	<div class="row">

		<!-- NAVIGATION -->
		<div class="col-lg-3 col-md-3">
			<?php require PROJECT_VIEWS_DIR.'/template/navigation.php'; ?>
			<?php require PROJECT_VIEWS_DIR.'/template/calendar.php'; ?>
		</div>
		
		<!-- COLUMN -->
		<div class="col-lg-9 col-md-9">

			<!-- THREAD -->
			<div class="card mb-2">
				<div class="card-body">
					<h5> <?= $thread->getTitle() ?></h5>
					<h6 class="card-subtitle text-muted mb-2">
						<?php echo 'Publicado em '.strftime('%d de %B de %Y, às %Hh%Mmin', strtotime($thread->getCreationDate())); ?>
					</h6>
					<p> <?= $thread->getContent() ?> </p>
					<a href="#" class="btn btn-default">Responder</a>
				</div>
			</div>

			<div class="card mb-2">
				<div class="card-body">
					<form method="POST" action="<?php buildURL('/forum/answer/store');?>">
						<input type="hidden" name="thread_id" value="<?= $thread->getId()?>">
						<div class="form-group">
							<label for="content">Conteúdo</label>
							<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
							<script>
								CKEDITOR.replace( 'content' );
							</script>
						</div>
						<div class="form-group">
							<input type="submit" value="Confirmar" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>

			<!-- ANSWERS -->
			<?php if (!empty($answers)): ?>
				<?php foreach ($answers as $answer): ?>
					<div class="card mb-2">
						<div class="card-body">
							<h5>Re: Lorem Ipsum</h5>
							<h6 class="card-subtitle text-muted mb-2">
								<?php echo 'Publicado em '.strftime('%d de %B de %Y, às %Hh%Mmin', strtotime($thread->getCreationDate())); ?>
							</h6>
							<p><?= $answer->getContent(); ?></p>
							<a href="#" class="btn btn-default">Responder</a>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>	
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>