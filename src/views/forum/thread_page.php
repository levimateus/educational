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


<!-- CONTAINER -->
<div class="container">

	<!-- ROW -->
	<div class="row">

		<!-- COLUMN -->
		<div class="col-12">

			<!-- MATTER PAGE HEADER -->
			<div class=my-3">
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

		<!-- COLUMN -->
		<div class="col-lg-3 col-md-3">
			<?php require PROJECT_VIEWS_DIR.'/template/navigation.php'; ?>
			<?php require PROJECT_VIEWS_DIR.'/template/calendar.php'; ?>
		</div>
		
		<!-- COLUMN -->
		<div class="col-lg-9 col-md-9">

			<!-- THREAD -->
			<div class="card">
				<div class="card-body">
					<h5> <?= $thread->getTitle() ?></h5>
					<h6 class="card-subtitle text-muted mb-2">
						<?php echo 'Publicado em '.strftime('%d de %B de %Y, às %Hh%Mmin', strtotime($thread->getCreationDate())); ?>
					</h6>
					<p> <?= $thread->getContent() ?> </p>
					<a href="#" class="btn btn-default">Responder</a>
				</div>
			</div>

			<!-- ANSWERS -->
			<?php if (!empty($answers)): ?>
				<?php foreach ($answers as $answer): ?>
					<div class="card">
						<div class="card-body">
							<h5>Título do post</h5>
							<p><?= $answer->getContent(); ?></p>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>	
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>