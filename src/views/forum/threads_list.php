<?php 
	ob_end_clean();
	$title  = 'Caderno Digital';
	$course = $param['course'];
	$matter = $param['matter'];
	$threads = $param['threads'];
	$topics = $param['topics']; 

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
						Fórum
					</li>
				</ol>
			</nav>
		</div>
	</div>

	<!-- ROW -->
	<div class="row">

		<!-- COLUMN -->
		<div class="col-lg-3 col-md-3">
			<?php require PROJECT_VIEWS_DIR.'/template/navigation.php'; ?>
			<?php require PROJECT_VIEWS_DIR.'/template/calendar.php'; ?>
		</div>
		
		<!-- COLUMN -->
		<div class="col-lg-9 col-md-9">
			<h1>Fórum de discussão</h1>

			<!-- NEW THREAD FORM -->
			<?php if ($user['role'] == PROJECT_TEACHER): ?>
				<h4>Inserir novo tópico</h4>

				<form method="POST" action="<?php buildURL('/forum/store'); ?>">
					<div class="form-group">
						<input type="hidden" name="matter_id" value=" <?= $matter->getId() ?> ">
						<label for="title">Título do tópico</label>
						<input type="text" class="form-control" id="title" name="title" required="required">
					</div>

					<div class="form-group">
						<label for="content">Conteúdo</label>
						<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
						<script>
							CKEDITOR.replace( 'content' );
						</script>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-block btn-success" value="Criar">
					</div>
				</form>
			<?php endif; ?>

			<!-- CONTROL PANEL -->
			<form action="<?php buildURL('/forum/delete'); ?>" method="post">
				<input type="hidden" name="matter_id" value="<?= $matter->getId() ?>">
				<div class="card mb-3">
					<div class="card-body">
						<div class="form-group">
							<input type="submit" id="delete" value="Excluir selecionados" class="btn btn-danger btn-sm">
						</div>
						
					</div>
				</div>

				<!-- LISTING FORUMS -->
				<div class="card mb-3">
					<div class="card-body">
						<?php if (!empty($threads)): ?>
							<table class="table">
								<tr>
									<th>Tópico</th>
									<th>Descrição</th>
									<th>Última resposta</th>
								</tr>
							<?php foreach ($threads as $thread): ?>
								<tr>
									<td>
										<input type="checkbox" name="id[]" value="<?= $thread->getId() ?>">
										<a href="<?php buildURL('/forum-'.$thread->getId());?>">
											<?= $thread->getTitle() ?>
										</a>
									</td>

									<td>
										<?= mb_strimwidth($thread->getContent(), 0, 140, ' (...) ') ?>
									</td>

									<td>
										23
									</td>	
								</tr>
							<?php endforeach; ?>
							</table>
							
						<?php else: ?>
							<p>Não há tópicos</p>
						<?php endif; ?>
					</div>
				</div>
			</form>
		</div>	
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>