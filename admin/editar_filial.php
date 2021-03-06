<?php
include_once( 'nav.php' );
require('../lib/editar_filial_show.php')
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Editar filial</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#cadastro" ).addClass( "active" );
			$( "#cad_drop" ).slideDown( 200 );
			$( "#cad_filial" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Edição de filial</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para atualizar o cadastro de uma filial.</h5>
			<br>
			<form id="colab_cadastro" action="../lib/editar_filial.php" enctype="multipart/form-data" method="post">


				<div class="form-row">
					
					<div class="form-group col-md-5">
						<label for="cidade">
							<red>*</red>Cidade</label>
						<input type="text" required name="cidade" placeholder="Cidade" value="<?php echo $cidade?>" class="form-control" id="input_cidade">
					</div>
					<div class="form-group col-md-3">
						<label for="estado">
							<red>*</red>Estado</label>
						<input type="text" required name="estado" placeholder="Estado" value="<?php echo $estado?>" class="form-control" id="input_estado">
					</div>
					<div class="form-group col-md-2">
						<label for="cep">
							<red>*</red>CEP</label>
						<input type="text" required name="cep" placeholder="_____-___" value="<?php echo $cep?>" class="form-control" id="input_cep">
					</div>
					<div class="form-group col-md-2">
						<label for="cnpj">
							<red>*</red>CNPJ</label>
						<input type="text" hidden="true" value="<?=$cnpj?>" id="cnpjold">
						<input type="text" required name="cnpje" value="<?=$cnpj?>" placeholder="__.___.___/____-__" class="form-control" id="input_cnpj">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="bairro">
							<red>*</red>Bairro</label>
						<input type="text" required name="bairro" placeholder="Bairro" class="form-control" value="<?php echo $bairro?>" id="input_bairro">
					</div>
					<div class="form-group col-md-5">
						<label for="rua">
							<red>*</red>Logradouro</label>
						<input type="text" required name="rua" placeholder="Rua, Av." value="<?php echo $rua?>" class="form-control" id="input_rua">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Número e complemento</label>
						<input type="text" required name="numero" placeholder="Número e complemento" class="form-control" value="<?php echo $numero?>" id="input_numero">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Telefone</label>
						<input type="text" required name="telefone" class="form-control" placeholder="(19) 999999999" value="<?php echo $telefone?>" id="input_telefone">
					</div>
					<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
				</div>

				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>

				<div>
					<a class="btn btn-primary" href="consulta_filial">Voltar</a>
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
				
				var $seuCampoCpf = $( "#input_cnpj" );
				$seuCampoCpf.mask( '00.000.000/0000-00', {
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