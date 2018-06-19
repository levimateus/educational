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
