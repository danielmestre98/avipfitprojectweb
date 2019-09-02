<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Relatório</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#relatorio" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Relatório de relação de alunos</h1>
			<br>
			
			<form id="exercicio_cadastro" action="novos_dep" enctype="multipart/form-data" method="post">
				
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="cidade">Mês de referência</label>
						<select required class="form-control" name="" id="aprovacao">
							<option value="1">Janeiro</option>
							<option value="1">Fevereiro</option>
							<option value="1">Março</option>
							<option value="1">Abril</option>
							<option selected value="1">Maio</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="cidade">Ano de referência</label>
						<select required class="form-control" name="" id="ano">
							<option value="1">2018</option>
							<option selected value="1">2019</option>

						</select>
					</div>
				</div>

				<p align="center"><img src="../img/relatorio.png" alt=""></p>

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