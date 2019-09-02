<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Redefinição de senha</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Redefinição de senha</h1>
			<br>
			<form id="nometrei_cadastro" action="codigo" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>Email</label>
						<input type="email" name="nomeTreinamento" required class="form-control" id="nomeTreinamento" placeholder="exemplo@exemplo.com">
					</div>
					<p>Campos com <red>*</red> são obrigatórios</p>
				</div>


				<a class="btn btn-primary" href="login">Voltar</a>
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