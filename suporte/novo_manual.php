<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Manuais</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#cadastro" ).addClass( "active" );
			$( "#cad_drop" ).slideDown( 200 );
			$( "#cad_exercicio" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Upload de manuais</h1>
			<br>
			<form id="exercicio_cadastro" action="manuais" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Nome do manual</label>
						<input type="text" name="nomeExercicio" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="foto"><red>*</red>Arquivo</label>
						<input type="file" required name="foto" class="form-control-file" id="foto">
					</div>
				</div>
				<p>Campos com <red>*</red> são obrigatórios</p>

				<a class="btn btn-primary" href="manuais">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Enviar</button>
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