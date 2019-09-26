<?php
include_once( 'nav.php' );
require( '../lib/editar_exercicio_show.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Editar exercicio</title>
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
			<h1>Edição de exercício</h1>
			<br>
			<form id="editar_exercicio" action="../lib/editar_exercicio.php?id=<?php echo $_GET['nome']?>" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Nome do exercício</label>
						<input type="text" name="nomeExerciciou" maxlength="20" value="<?php echo $exercicio?>" required class="form-control" id="nomeExercicio" placeholder="Nome">
						<input type="text" hidden="true" value="<?=$exercicio?>" id="nomeOld">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="descricao">
							<red>*</red>Descrição</label>
						<input type="text" required value="<?php echo $descricao?>" maxlength="100" name="descricao" class="form-control" id="descricao">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">Link do vídeo</label>
						<input type="text" name="url" value="<?php echo $url?>" maxlength="100" placeholder="https://www.exemplo.com" class="form-control" id="input_cidade">
						<input type="text" hidden="true" value="<?=$url?>" id="linkOld">
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