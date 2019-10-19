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
			<?php if(isset($_GET['email']) && isset($_GET['token'])){
				include ('conectar.php');
				$email = $_GET['email'];
				$token = $_GET['token'];
				$resulted = mysqli_query( $conn, "SELECT token FROM token WHERE token = '$token' AND email = '$email'" );
				if ( mysqli_num_rows( $resulted ) > 0 ){
			
			?>
			<br>
			<h1>Redefinição de senha</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para redefinir sua senha.</h5>
			<br>
			<form id="redef_senha" action="/lib/nova_senha" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Nova senha</label>
						<input type="password" name="senha" maxlength="50" required class="form-control" id="senha" placeholder="Mínimo de 8 caracteres">
						<input type="text" hidden="true" name="email" value="<?=$_GET['email']?>">
					</div>
					<div class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Confirme a senha</label>
						<input type="password" name="confsenha" maxlength="50" required class="form-control" id="confsenha" placeholder="Mínimo de 8 caracteres">
					</div>
					<p> Campos com
						<red>*</red> são obrigatórios</p>
				</div>


				<a class="btn btn-primary" href="login">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>
			<?php }else{
		echo "<script language='JavaScript'> window.location='login?inv=true'; </script> ";
	}}
	else{
		echo "<script language='JavaScript'> window.location='login?inv=true'; </script> ";
	}
?>


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