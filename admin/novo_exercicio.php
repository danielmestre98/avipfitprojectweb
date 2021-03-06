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
			<h1>Cadastro de exercícios</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para cadastrar um exercício.</h5>
			<br>
			<form id="exercicio_cadastro" action="../lib/novo_exercicio.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Nome do exercício</label>
						<input type="text" name="nomeExercicio" maxlength="255" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="descricao"><red>*</red>Descrição</label>
						<textarea placeholder="Descrição" rows="5" type="text" required name="descricao" maxlength="1022" class="form-control" id="descricao"></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">Link do vídeo</label>
						<input type="text" name="url" maxlength="100" placeholder="https://www.exemplo.com" class="form-control" id="input_cidade">
					</div>
					<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
				</div>


				<a class="btn btn-primary" href="consulta_exercicio">Voltar</a>
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