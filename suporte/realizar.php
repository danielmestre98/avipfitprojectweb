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
		<div class="container-fluid p-5">
			<h1>Upload de manuais</h1>
			<h5>Preencha os campos obrigatórios e clique em Salvar para registrar um manual.</h5>
			<br>
			<form id="novo_manual" action="../lib/novo_manual" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Nome do manual</label>
						<input type="text" name="manual" required class="form-control" id="manual" placeholder="Nome">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="foto"><red>*</red>Adicione um arquivo ao registro do manual, o formato admitido é .zip.</label>
						<input type="file" required name="foto" class="form-control-file" accept="application/x-zip-compressed, application/x-zip, application/zip" id="foto">
					</div>
				</div>
				<p>Campos com <red>*</red> são obrigatórios</p>

				<a class="btn btn-primary" href="manuais">Voltar</a>
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