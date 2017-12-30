<?php 
	ob_end_clean();
	$title = 'Bem vindo';
	include 'template/header.php';
?>
<!-- *********************************************************** -->
<div class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="./">Sistema Educacional</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li>
		</ul>
	</div>
</div>

<!-- *********************************************************** -->
<?php include 'template/footer.php';?>