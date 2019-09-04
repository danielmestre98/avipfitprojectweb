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
			<h1 align="center">Cadastro de parceiro</h1>
			<br>
			<form id="novo_parceiro" action="../lib/novo_parceiro" enctype="multipart/form-data" method="post">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">
							<red>*</red>Nome</label>
						<input type="text" placeholder="Nome" required name="nome" class="form-control" id="input_nome">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
							<label for="cnpj">
								<red>*</red>CNPJ</label>
							<input type="text" placeholder="__.___.___/____-__" required name="cnpj" class="form-control" id="input_cnpj">
					</div>
					<div class="form-group col-md-8">
						<label for="email">
							<red>*</red>E-mail</label>
						<input type="text" placeholder="exemplo@exemplo.com" required name="email" class="form-control" id="input_email">
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
						<input type="text" required name="cidade" class="form-control" id="input_cidade">
					</div>
					<div class="form-group col-md-4">
						<label for="estado">
							<red>*</red>Estado</label>
						<input type="text" required name="estado" class="form-control" id="input_estado">
					</div>
					<div class="form-group col-md-2">
						<label for="cep">
							<red>*</red>CEP</label>
						<input type="text" required name="cep" class="form-control" id="input_cep">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="bairro">
							<red>*</red>Bairro</label>
						<input type="text" required name="bairro" class="form-control" id="input_bairro">
					</div>
					<div class="form-group col-md-5">
						<label for="rua">
							<red>*</red>Logradouro</label>
						<input type="text" required name="rua" class="form-control" id="input_rua">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Número</label>
						<input type="text" required name="numero" class="form-control" id="input_numero">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Telefone</label>
						<input type="text" placeholder="(99)99999999" required name="telefone" class="form-control" id="input_telefone">
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
				var $seuCampoCpf = $( "#input_cnpj" );
				$seuCampoCpf.mask( '00.000.000/0000-00', {
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