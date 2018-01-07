<?php 
	$user = $_SESSION['user'];
 ?>

<div style="height: 57px">
	<nav class="navbar navbar-expand-lg navbar-light bg-light border border-top-0 border-left-0 border-right-0 fixed-top">
		<a href="<?php buildUrl('/');?>" class="navbar-brand ml-2 mr-4">Caderno Digital</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
				

			<form class="form-inline my-2 my-lg-0">
				<input type="search" class="form-control mr-sm-2" placeholder="Pesquisar matéria" type="search" size="35">
				<button class="btn btn-outline-info my-2 my-sm-0 type submit" >Buscar</button>
			</form>

			<ul class="nav navbar-nav mr-auto ml-2">
				<?php if ($user['role'] == PROJECT_ADMIN): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"	href="#">Gerenciar</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Meu Perfil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php buildUrl('/course/manage')?>">Cursos</a>
						<a class="dropdown-item" href="<?php buildUrl('/user/manage')?>">Usuários</a>
					</div>
				</li>
				<?php endif; ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"	href="#">Cursos</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="">Exibir Catálogo</a>
						<a class="dropdown-item" href="">Meus Cursos</a>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav mr-2">
				<li class="nav-item">
					<a class="nav-link" href="<?php buildUrl('/logout');?>">Sair</a>
				</li>
			</ul>
		</div>
	</nav>
</div>