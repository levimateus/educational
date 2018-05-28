<?php 
	ob_end_clean();
	$title  = 'Caderno Digital';
	$course = $param['course'];
	$matter = $param['matter'];
	$forums = $param['forums'];
	$topics = $param['topics']; 

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

			<!-- NAVIGATION -->
			<nav class="card mb-3">
				<div class="card-body" role="navigation">
					<h5>Administração</h5>
					<ul class="nav">
						<li class="nav-item">
							<a href="<?php buildURL('/matter-'.$matter->getId());?>" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/home.png')?>" alt="Forum" width="30">&nbsp Página Inicial</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/notice.png')?>" alt="Notice" width="30">&nbsp Avisos da matéria</a>
						</li>
						<li class="nav-item">
							<a href="<?php buildURL('/forum/matter-'.$matter->getId()); ?>" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/users-group.png')?>" alt="Forum" width="30">&nbsp Discussão</a>
						</li>
						
						<li class="nav-item">
							<a href="#" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/college-graduationa.png')?>" alt="Notice" width="30">&nbsp Minhas Notas</a>
						</li>
					</ul>
					<h5>Tópicos</h5>
					<ul class="nav">
						<?php foreach ($topics as $topic): ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php buildURL('/matter-'.$matter->getId());?>#topic<?= $topic->getId() ?>">
									<?= $topic->getTitle() ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</nav>
		</div>
		
		<!-- COLUMN -->
		<div class="col-lg-9 col-md-9">
			<h1>Fórum de discussão</h1>

			<!-- NEW FORUM FORM -->
			<?php if ($user['role'] == PROJECT_TEACHER): ?>
				<h4>Inserir novo tópico</h4>

				<form method="POST" action="<?php buildURL('/forum/store'); ?>">
					<div class="form-group">
						<input type="hidden" name="matter_id" value=" <?= $matter->getId() ?> ">
						<label for="title">Título do tópico</label>
						<input type="text" class="form-control" id="title" name="title" required="required">
					</div>

					<div class="form-group">
						<label for="description">Descrição</label>
						<textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-block btn-success" value="Criar">
					</div>
				</form>
			<?php endif; ?>

			<!-- LISTING FORUMS -->
			<div class="card mb-3">
				<div class="card-body">
					<?php if (!empty($forums)): ?>
						<table class="table">
							<tr>
								<th>Tópico</th>
								<th>Descrição</th>
								<th>Respostas</th>
								<th>Última Mensagens</th>
							</tr>
						<?php foreach ($forums as $forum): ?>
							<tr>
								<td><a href="<?php buildURL('/forum-'.$forum->getId());?>"><?= $forum->getTitle() ?></a> </td>
								<td><div><?= $forum->getDescription() ?></div></td>
								<td>23</td>
								<td>sad</td>
							</tr>
						<?php endforeach; ?>
						</table>
						
					<?php else: ?>
						<p>Não há tópicos</p>
					<?php endif; ?>
				</div>
			</div>
		</div>	
	</div>
</div>

<?php include PROJECT_VIEWS_DIR.'template/footer.php';?>