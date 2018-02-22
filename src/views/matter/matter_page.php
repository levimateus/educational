<?php 
	ob_end_clean();
	$title  = 'Caderno Digital';
	$course = $param['course'];
	$matter = $param['matter'];
	$topics = $param['topics']; 

	include PROJECT_VIEWS_DIR.'template/header.php';
?>

<?php include PROJECT_VIEWS_DIR.'/template/navbar.php' ?>

<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class=" my-3">
				<h1 class="display-4"><?php echo $matter->getName(); ?></span></h1>
				<p class="lead">
					<?php echo $matter->getDescription(); ?>
				</p>
				<h5 class="display-5">
					<b>Professor: </b><a href=""><?php echo $matter->getUserName(); ?></a>
				</h5>
			</div>
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
						<?= $matter->getName() ?>
					</li>
				</ol>
			</nav>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-3 col-md-3">
			<nav class="card mb-3">
				<div class="card-body">
					<h5>Tópicos</h5>
					<ul class="nav">
						<?php foreach ($topics as $topic): ?>
							<li class="nav-item">
								<a class="nav-link" href="#topic<?= $topic->getId() ?>">
									<?= $topic->getTitle() ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</nav>
		</div>

		<div class="col-lg-9 col-md-9">
			<?php if ($user['role'] == PROJECT_TEACHER): ?>
				<div class="card mb-3 px-0">
					<div class="card-body">
						<form action="<?php buildURL('/topic/store'); ?>" method="post">
						<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
						<h2 class="card-title">Criar novo tópico</h2>
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
							<div class="form-group">
								<input type="submit" class="btn btn-success float-right" value="Confirmar">
							</div>
						</form>
					</div>
				</div>
			<?php endif ?>
			<?php foreach ($topics as $topic): ?>		
				<div class="card mb-3">
					<div class="card-body">
						<h2 class="card-title" id="topic<?php echo $topic->getId(); ?>">
							<?php echo $topic->getTitle(); ?>
						</h2>
						<h6 class="card-subtitle text-muted mb-2">
							<?php echo $topic->getCreationDate(); ?>
						</h6>
						
						<?php echo $topic->getContent(); ?>
						<?php if ($user['role'] == PROJECT_TEACHER): ?>
							<hr class="my-2">
							<form action="<?php buildURL('/topic/delete')?>" method="post">
								<input type="hidden" name="topic_id" value="<?= $topic->getId() ?>">
								<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
								<input type="submit" value="Apagar" class="btn btn-danger">
								<input type="submit" formaction="<?php buildURL('/topic/edit')?>" value="Editar (Em breve)" class="btn btn-warning" disabled>
							</form>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>