<?php
include_once( 'nav.php' );

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
		<div class="container">
			<h1 align="center">Gráficos</h1>
			<br>
			
			<form id="exercicio_cadastro" action="novos_dep" enctype="multipart/form-data" method="post">
				
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">Selecionar grafico</label>
						<select required class="form-control" name="" id="aprovacao">
							<option value="1">Percentual de gordura X Peso</option>
						</select>
					</div>
				</div>

				<p align="center"><img src="../img/grafico.png" alt=""></p>

				<a class="btn btn-primary" href="aval_fisica">Voltar</a>
				<a style="float: right" href="#" class="btn btn-primary">Download <i class="fas fa-download"></i></a>
				
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