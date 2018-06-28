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
			<div class="jumbotron mb-2 py-4">
					<h5> <?= $thread->getTitle() ?></h5>
					<h6 class="text-muted mb-2">
						<?php echo 'Publicado em '.strftime('%d de %B de %Y, às %Hh%Mmin', strtotime($thread->getCreationDate())); ?>
					</h6>
					<p> <?= $thread->getContent() ?> </p>
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#thread_answer_modal">Responder</button>
					<a class="btn btn-outline-success" href="#">Citar</a>
			</div>

			<!-- ANSWER MODAL -->

			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="thread_answer_modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Responder</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="POST" action="<?php buildURL('/forum/answer/store');?>">
							<div class="modal-body">
								<div class="form-group">
									<input type="hidden" name="thread_id" value="<?= $thread->getId()?>">
									<label>Título</label>
									<input type="text" name="title" class="form-control" disabled="disabled">
								</div>
								<div class="form-group">
									<label for="content">Conteúdo</label>
									<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
									<script>
										CKEDITOR.replace( 'content' );
									</script>
								</div>
							</div>
							<div class="modal-footer">
								<input type="submit" value="Confirmar" class="btn btn-success">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							</div>
						</form>
					</div>
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
							<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#thread_answer_modal">Citar</button>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>	
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>