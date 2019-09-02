<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo parceiro</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#parceiros" ).addClass( "active" );
			
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Novo parceiro</h1>
			<br>
			<form id="colab_cadastro" action="parceiros" enctype="multipart/form-data" method="post">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">
							<red>*</red>Nome</label>
						<input type="text" required name="nome" value="Centro de estética" class="form-control" id="input_nome">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
							<label for="cnpj">
								<red>*</red>CNPJ</label>
							<input type="text" required name="cnpj" value="36.448.141/0001-19" class="form-control" id="input_cnpj">
					</div>
					<div class="form-group col-md-8">
						<label for="email">
							<red>*</red>E-mail</label>
						<input type="text" required name="email" value="estetica@hotmail.com" class="form-control" id="input_email">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="foto">Foto (Formatos: jpg, jpeg, png)</label>
						<input type="file" name="foto" class="form-control-file" id="foto">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Cidade</label>
						<input type="text" required name="cidade" value="Americana" class="form-control" id="input_cidade">
					</div>
					<div class="form-group col-md-4">
						<label for="estado">
							<red>*</red>Estado</label>
						<input type="text" required name="estado" class="form-control" value="São Paulo" id="input_estado">
					</div>
					<div class="form-group col-md-2">
						<label for="cep">
							<red>*</red>CEP</label>
						<input type="text" required name="cep" value="13588-270" class="form-control" id="input_cep">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="bairro">
							<red>*</red>Bairro</label>
						<input type="text" required name="bairro" value="Novo Mundo" class="form-control" id="input_bairro">
					</div>
					<div class="form-group col-md-5">
						<label for="rua">
							<red>*</red>Logradouro</label>
						<input type="text" required name="rua" value="Av. de Cillo" class="form-control" id="input_rua">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Número</label>
						<input type="text" required name="numero" value="1500" class="form-control" id="input_numero">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Telefone</label>
						<input type="text" required name="telefone" value="(19)3875-9878" class="form-control" id="input_telefone">
					</div>
				</div>

				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>

				<div>
					<a class="btn btn-primary" href="parceiros">Voltar</a>
					<button type="submit" class="btn btn-primary float-right">Salvar</button>
				</div>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="../js/jquery.mask.js"></script>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				var $seuCampoCpf = $( "#input_CPF" );
				$seuCampoCpf.mask( '000.000.000-00', {
					reverse: false
				} );


				var $CampoHora = $( ".hora" );
				$CampoHora.mask( '00:00', {
					reverse: true
				} );

				var $CampoTel = $( "#input_telefone" );
				$CampoTel.mask( '(00) 000000000', {
					reverse: false
				} );

				var $CampoCep = $( "#input_cep" );
				$CampoCep.mask( '00000-000', {
					reverse: false
				} );

				var $CampoValor = $( "#salario" );
				$CampoValor.mask( '0000', {
					reverse: true
				} );
				$( 'input, :input' ).attr( 'autocomplete', 'off' );
			} );
		} );
	</script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>