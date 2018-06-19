<!-- NAVIGATION -->
<nav class="card mb-3">
	<div class="card-body" role="navigation">
		<h5>Administração</h5>
		<ul class="nav">
			<li class="nav-item">
				<a href="<?php buildURL('/matter-'.$matter->getId());?>" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/home.png')?>" alt="Forum" width="30">&nbsp Página Inicial</a>
			</li>
			<li class="nav-item">
				<a href="<?php buildURL('/notice/matter-'.$matter->getId()); ?>" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/notice.png')?>" alt="Notice" width="30">&nbsp Avisos da matéria</a>
			</li>
			<li class="nav-item">
				<a href="<?php buildURL('/forum/matter-'.$matter->getId()); ?>" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/users-group.png')?>" alt="Forum" width="30">&nbsp Discussão</a>
			</li>
			
			<li class="nav-item">
				<a href="#" class="nav-link"><img class="img-fluid" src="<?php buildURL('/assets/images/application/icons/college-graduationa.png')?>" alt="Notice" width="30">&nbsp Minhas Notas</a>
			</li>
		</ul>

		<?php if (isset($topics)): ?>
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
		<?php endif ?>
		<?php if (isset($notices)): ?>
			<h5>Avisos</h5>
			<ul class="nav">
				<?php foreach ($notices as $notice): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php buildURL('/notice/matter-'.$matter->getId());?>#notice<?= $notice->getId() ?>">
							<?= $notice->getTitle() ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>		
	</div>
</nav>