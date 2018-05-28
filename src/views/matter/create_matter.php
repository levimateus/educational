<!-- MATTER CREATION FORM -->

<form action="<?php buildURL('/matter/store'); ?>" method="post">
	<input type="hidden" name="course_id" value="<?php echo $course->getId(); ?>">

	<!-- ROW -->
	<div class="form-row">
		
		<!-- MATTER NAME -->
		<div class="form-group col-lg-6 col-md-6">
			<label for="name">Nome <b class="text-danger">*</b></label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Nome da matéria" required="required">
		</div>

		<!-- MATTER KEY -->
		<div class="form-group col-lg-6 col-md-6">
			<label for="matter_key">Chave (Opcional)</label>
			<input type="password" class="form-control" id="matter_key" name="key" placeholder="Chave de acesso">
		</div>
	</div>

	<!-- ROW -->
	<div class="form-row">

		<!-- MATTER YEAR -->
		<div class="form-group col-lg-6 col-md-6">
			<label for="matter_year">Ano <b class="text-danger">*</b></label>
			<select name="year" id="matter_year" class="form-control" required="required">
				<?php for ($year = date('Y'); $year >= 1995 ; $year--):?>
					<option value="<?= $year ?>"><?= $year ?></option>	
				<?php endfor; ?>
			</select>
		</div>

		<!-- HALFYEAR -->
		<div class="form-group col-lg-6 col-md-6">
			<label for="matter_halfyear">Semestre <b class="text-danger">*</b></label>
			<select name="halfyear" id="matter_halfyear" class="form-control" required="required">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</div>

	</div>

	<!-- MATTER DESCRIPTION -->
	<div class="form-group">
		<label for="matter_description">Descrição</label>
		<textarea name="description" id="matter_description" rows="15" class="form-control" placeholder="Breve descrição da matéria" style="resize: none;"></textarea>
	</div>
	<hr>

	<!-- CONFIRM OR CANCEL -->
	<div class="form-group text-right">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="submit" class="btn btn-primary" value="Confirmar">
	</div>
	
</form>
