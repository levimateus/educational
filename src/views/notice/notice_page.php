<?php 
	ob_end_clean();
	$title  = 'Caderno Digital';
	$course = $param['course'];
	$matter = $param['matter'];
	$notices = $param['notices']; 

	include PROJECT_VIEWS_DIR.'template/header.php';
?>
<!-- HEADER TEMPLATE -->
<?php include PROJECT_VIEWS_DIR.'/template/navbar.php'; ?>

<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

<!-- CONTAINTER -->
<div class="container">

	<!-- ROW -->
	<div class="row">
		<div class="col-12">

			<!-- MATTER TITLE AND DESCRIPTION -->
			<div class=" my-3">
				<h1 class="display-4"><?php echo $matter->getName(); ?></span></h1>
				<p class="lead">
					<?php echo $matter->getDescription(); ?>
				</p>
				<h5 class="display-5">
					<b>Professor: </b><a href=""><?php echo $matter->getUserName(); ?></a>
				</h5>
			</div>

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
						Avisos
					</li>
				</ol>
			</nav>
			
		</div>
	</div>

	<!-- ROW -->
	<div class="row">
		<div class="col-lg-3 col-md-3">
			<?php require PROJECT_VIEWS_DIR.'/template/navigation.php'; ?>
			<?php require PROJECT_VIEWS_DIR.'/template/calendar.php'; ?>
		</div>
		
		<!-- TOPICS -->
		<div class="col-lg-9 col-md-9">

			<!-- NEW TOPIC FORM ONLY FOR TEACHERS -->
			<?php if ($user['role'] == PROJECT_TEACHER): ?>
				<div class="card mb-3 px-0">
					<div class="card-body">
						<form action="<?php buildURL('/notice/store'); ?>" method="post">
							<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
							<h2 class="card-title">Novo aviso</h2>

							<div class="form-group">
								<label for="title">Título</label>
								<input type="text" class="form-control" name="title" id="title" placeholder="Informe um título para o tópico" required="required">
							</div>

							<div class="form-group">
								<label for="content">Conteúdo</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
								<script>
									CKEDITOR.replace( 'content' );
								</script>
							</div>

							<hr>

							<div>
								<!--button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Anexar conteúdo</button-->

								<div class="form-group my-1">
									<input type="submit" class="btn btn-success btn-block float-right" value="Confirmar">
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php endif ?>

			<!-- TOPICS -->
			<?php if (!empty($notices)): ?>
				
			<?php foreach ($notices as $notice): ?>		
				<div class="card mb-3">
					<div class="card-body">
						<h2 class="card-title" id="notice<?php echo $notice->getId(); ?>">
							<?php echo $notice->getTitle(); ?>
						</h2>
						<h6 class="card-subtitle text-muted mb-2">
							<?php echo $notice->getCreationDate(); ?>
						</h6>
						
						<?php echo $notice->getContent(); ?>
						<?php if ($user['role'] == PROJECT_TEACHER): ?>
							<hr class="my-2">
							<form action="<?php buildURL('/notice/delete')?>" method="post">
								<input type="hidden" name="notice_id" value="<?= $notice->getId() ?>">
								<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
								<input type="submit" value="Apagar" class="btn btn-danger">
								<input type="submit" formaction="<?php buildURL('/notice/edit')?>" value="Editar (Em breve)" class="btn btn-warning" disabled>
							</form>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach ?>
			
			<?php else: ?>
				<div class="alert alert-warning">Não há avisos</div>
			<?php endif ?>

		</div>
	</div>
</div>

<!-- FOOTER TEMPLATE -->
<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>