<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo avaliação física</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#aval_fisica" ).addClass( "active" );
			
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Avaliação física</h1>
			<br>
			<form id="exercicio_cadastro" action="aval_fisica" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Nome</label>
						<input type="text" readonly name="nomeExercicio" value="Daniel Mestre Loureiro" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="descricao"><red>*</red>Altura</label>
						<input type="text" required name="descricao" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-3">
						<label for="gordura"><red>*</red>Peso</label>
						<input type="text" required name="gordura" class="form-control" id="gordura">
					</div>
					<div class="form-group col-md-3">
						<label for="peso"><red>*</red>Percentual de gordura</label>
						<input type="text" required name="peso" class="form-control" id="peso">
					</div>
					<div class="form-group col-md-3">
						<label for="coxa"><red>*</red>Coxa</label>
						<input type="text" required name="coxa" class="form-control" id="coxa">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Bíceps</label>
						<input type="text" required name="biceps" class="form-control" id="biceps">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Tríceps</label>
						<input type="text" required name="cintura" class="form-control" id="cintura">
					</div>
					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Cintura</label>
						<input type="text" required name="triceps" class="form-control" id="triceps">
					</div>
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Pressão arterial</label>
						<input type="text" required name="pressao" class="form-control" id="pressao">
					</div>
					
				</div>

				<p>Campos com <red>*</red> são obrigatórios</p>
				<a class="btn btn-primary" href="aval_fisica">Voltar</a>
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