<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Login</title>
	<link rel="stylesheet" href="css/reddot.css">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<?php
		if (isset($_GET['mail'])){
		?>
		<div id="new" style="width: 26%; position: absolute; margin-left: 68%; z-index: 5000" class="alert alert-success alert-dismissible fade show">
		  <strong>E-mail enviado com sucesso!</strong>  E-mail enviado com sucesso! Por favor, siga as instruções do e-mail para prosseguir com a redefinição de senha. Verifique sua caixa de spam. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
		</div>

		<?php }?>
		<?php
		if (isset($_GET['inv'])){
		?>
		<div id="" style="width: 26%; position: absolute; margin-left: 68%; z-index: 5000" class="alert alert-danger alert-dismissible">
		  <strong>Erro!</strong> O link é inválido ou expirou. Solicite novamente a recuperação de senha. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
		</div>

		<?php }?>
		<?php
		if (isset($_GET['suc'])){
		?>
		<div id="errodelete" style="width: 26%; position: absolute; margin-left: 68%; z-index: 5000" class="alert alert-success alert-dismissible">
		  <strong>Sucesso!</strong> Senha alterada com sucesso!
		</div>

		<?php }?>
		<div class="container login-container">
			<div class="row justify-content-center">
				<div class="col-md-6 login-form-1">
					<h3>Login AVIPfit</h3>
					<form id="login" action="lib/login" method="post">
						<div class="form-group">
							<input type="email" name="email" required class="form-control" placeholder="*E-mail" value="<?php if (isset($_SESSION['email']))
								{
									echo $_SESSION['email'];
									unset($_SESSION['email']);
								}?>"/>
						</div>
						<div class="form-group">
							<input type="password" name="senha" required class="form-control" placeholder="*Senha"/>
						</div>
						<div class="form-group" align="center">
							<red><?php
							if ( isset( $_SESSION[ 'message' ] ) ) {

								echo $_SESSION[ 'message' ];
								unset( $_SESSION[ 'message' ] );

							}
							?></red>
						</div>
						<div class="form-group" align="center">
							<input type="submit" class="btn btn-primary" value="Login"/>
						</div>
						<div class="form-group" align="center">
							<a href="redef_senha" class="ForgetPwd">Esqueceu sua senha?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/additional-methods.min.js"></script>
	<script src="js/valida_form.js"></script>
	<!-- page-content" -->
	</div>
		<script>
		$( document ).ready( function () {
			$('#errodelete').delay(5000).fadeOut(400);
		});

	</script>
</body>
</html>