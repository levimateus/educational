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
							<hr>
							<div>
								<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Anexar conteúdo</button>

								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="modal-title">Anexar arquivos</h3>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="">
													<div class="form-group">
														<label for="">Título</label>
														<input type="text" class="form-control" placeholder="Título do anexo" required="required">
													</div>
													<div class="form-group">
														<label for="">Arquivos</label>
														<div class="mb-2" align="center" style="    
															height: 150px; 
															border-style: dashed; 
												            color: #777777;
												            line-height: 150px;
												            border-width: thick; 
												            border-color: #AAAAAA;">
															Insira aqui o arquivo
														</div>
													</div>
													<div class="form-group">
														<label for="append_description">Descrição do anexo</label>
														<textarea name="append_description" id="description" class="form-control" cols="30" rows="10"></textarea>
														<script>
															CKEDITOR.replace( 'append_description' );
														</script>
													</div>
													
													<hr>
													<input class="btn btn-success float-right" type="submit" value="Confirmar">
												</form>
											</div>
										</div>
									</div>
								</div>

								
							</div>
							<div class="form-group my-1">
								<input type="submit" class="btn btn-success btn-block float-right" value="Confirmar">
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