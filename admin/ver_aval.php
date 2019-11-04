<?php
include_once( 'nav.php' );
include ('../lib/ver_aval.php');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Avaliação física</title>
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
		<div class="container-fluid p-5">
			<h1>Avaliação física</h1>
			<br>
			<a class="btn btn-primary" href="graficos?id=<?=$id ?>">Gráficos</a> 
			<br>
			<br>
			<form id="exercicio_cadastro" enctype="multipart/form-data">
				
				<div class="form-row">
					<div class="form-group col-md-2">
						<label>Metabolismo basal (KCAL)</label>
						<input class="form-control" type="text" disabled value="<?=$metabolismo?>">
					</div>
					<div class="form-group col-md-2">
						<label>Gordura (%)</label>
						<input class="form-control" type="text" disabled value="<?=$gordura?>">
					</div>
					<div class="form-group col-md-2">
						<label>Gordura ideal(%)</label>
						<input class="form-control" type="text" disabled value="<?=$ideal?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso total atual (Kg)</label>
						<input class="form-control" type="text" disabled value="<?=$massa?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso total ideal (Kg)</label>
						<input class="form-control" type="text" disabled value="<?=$pesoideal?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso gordo atual</label>
						<input class="form-control" type="text" disabled value="<?=$pesogatual?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label>Peso gordo ideal</label>
						<input class="form-control" type="text" disabled value="<?=$pesogideal?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso magro atual</label>
						<input class="form-control" type="text" disabled value="<?=$pesomatual?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso magro ideal</label>
						<input class="form-control" type="text" disabled value="<?=$pesomideal?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso em excesso</label>
						<input class="form-control" type="text" disabled value="<?=$pesoexcesso?>">
					</div>
				</div>
				<h6>Metas para re-avaliação</h6>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label>Peso total</label>
						<input class="form-control" type="text" disabled value="<?=$novopeso?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso gordo</label>
						<input class="form-control" type="text" disabled value="<?=$novopesog?>">
					</div>
					<div class="form-group col-md-2">
						<label>Peso magro</label>
						<input class="form-control" type="text" disabled value="<?=$novopesom?>">
					</div>
					<div class="form-group col-md-2">
						<label>Meta do aluno</label>
						<input class="form-control" type="text" disabled value="<?=$meta?>">
					</div>
				</div>
				<a class="btn btn-primary" href="aval_fisica">Voltar</a>
				
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