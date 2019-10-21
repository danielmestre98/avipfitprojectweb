<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Ticket</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#ajuda" ).addClass( "active" );
			$( "#ajuda_drop" ).slideDown( 200 );
			$( "#tickets" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Novo ticket</h1>
			<br>
			
			<form id="new_ticket" action="../lib/novo_ticket" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nome_ticket">
							<red>*</red>Título</label>
					

						<input type="text" name="nome_ticket" required class="form-control" id="nome_ticket" placeholder="Insira um título ao ticket">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="desc"><red>*</red>Descrição</label>
						<textarea name="desc" class="form-control" id="desc" cols="30" required placeholder="Descreva detalhadamente sobre o ticket" rows="10"></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">Anexar arquivos (Formatos: jpg, jpeg, png)</label>
						<input type="file" name="foto" class="form-control-file" id="foto">
					</div>
				</div>
				<p>Campos com <red>*</red> são obrigatórios.</p>


				<a class="btn btn-primary" href="tickets">Voltar</a>
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