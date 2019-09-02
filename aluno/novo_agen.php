<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo exercicio</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Agendamento de avaliação física</h1>
			<br>
			<form id="exercicio_cadastro" action="agendamento" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="nomeExercicio">
							<red>*</red>Data do agendamento</label>
						<input type="date" name="nomeExercicio" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
					<div class="form-group col-md-2">
						<label for="descricao"><red>*</red>Horario</label>
						<select required class="form-control" name="" id="">
							<option value=""></option>
							<option  value="">13:00</option>
							<option value="">14:00</option>
						</select>
					</div>
					<br>
	
				</div>

				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
				<br>
				<a href="agendamento" class="btn btn-primary">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>