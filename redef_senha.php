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
		<div class="container-fluid p-5">
			<br>
			<h1>Redefinição de senha</h1>
			<br>
			<h5>Preencha o campo obrigatório e clique em Enviar para receber o link de redefinição de senha em seu e-mail.</h5>
			<br>
			<form id="redef_senha" action="env_email" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							<red>*</red>E-mail</label>
						<input type="email" name="email" required class="form-control" id="email" placeholder="exemplo@exemplo.com">
					</div>
					<p> Campos com <red>*</red> são obrigatórios</p>
				</div>


				<a class="btn btn-primary" href="login">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Enviar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="js/jquery.mask.js"></script>

	<script src="js/jquery.validate.min.js"></script>
	<script src="js/additional-methods.min.js"></script>
	<script src="js/valida_form.js"></script>
</body>
</html>