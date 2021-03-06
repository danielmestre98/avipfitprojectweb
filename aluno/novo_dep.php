<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Aprovação</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#depoimentos" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Novo depoimento</h1>
			<br>
			<h5>Sua opinião é muito importante para a AVIPfit, compartilhe conosco sobre suas experiências no studio! Preencha o campo obrigatório e clique em Salvar para submeter um depoimento.</h5>
			<br>

			<form id="depoimento" action="../lib/novo_depoimento.php" enctype="multipart/form-data" method="post">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="">
							<red>*</red>Descrição</label>
						<textarea maxlength="1022" required name="descr" class="form-control" id="descr" cols="30" rows="10" placeholder="Escreva seu depoimento aqui..."></textarea>
					</div>
					<p> Campos com <red>*</red> são obrigatórios.</p>
				</div>




				<a class="btn btn-primary" href="depoimentos">Voltar</a>
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