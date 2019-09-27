<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo colaborador</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#cadastro" ).addClass( "active" );
			$( "#cad_drop" ).slideDown( 200 );
			$( "#cad_colab" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Cadastro de colaborador</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para cadastrar um colaborador.</h5>
			<br>
			<form id="colab_cadastro" action="../lib/novo_colaborador.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">
							<red>*</red>Nome</label>
						<input type="text" name="nome" maxlength="255" required class="form-control" id="input_nome" placeholder="Nome">
					</div>
					<div class="form-group col-md-6">
						<label for="cpf">
							<red>*</red>CPF</label>
						<input type="text" required name="cpf" data-placement="bottom" data-animation="true" data-content="CPF inválido" class="form-control" id="input_CPF" placeholder="___.___.___-__">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="email"><i><red>*</red>E-mail</i></label>
						<input type="email" required name="email" maxlength="50" class="form-control" id="email" placeholder="exemplo@exemplo.com">
					</div>
					<div class="form-group col-md-4">
						<label for="telefone">
							<red>*</red>Telefone</label>
						<input type="text" required name="telefone" class="form-control" id="input_telefone" placeholder="(19) 999999999">
					</div>
					<div class="form-group col-md-2">
						<label for="nasc">
							<red>*</red>Data de nascimento</label>
						<input required name="nascimento" type="date" class="form-control" id="input_nasc">
					</div>
				</div>
				<div class="form-group">
					<label for="foto">Adicione uma foto ao perfil do colaborador, os formatos admitidos são jpg, jpeg e png.</label>
					<input type="file" name="foto" class="form-control-file" id="foto">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Cidade</label>
						<input type="text" placeholder="Cidade" maxlength="255" required name="cidade" class="form-control" id="input_cidade">
					</div>
					<div class="form-group col-md-4">
						<label for="estado">
							<red>*</red>Estado</label>
						<input type="text" required placeholder="Estado" maxlength="255" name="estado" class="form-control" id="input_estado">
					</div>
					<div class="form-group col-md-2">
						<label for="cep">
							<red>*</red>CEP</label>
						<input type="text" required name="cep" placeholder="_____-___" class="form-control" id="input_cep">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="bairro">
							<red>*</red>Bairro</label>
						<input type="text" required name="bairro" maxlength="255" placeholder="Bairro" class="form-control" id="input_bairro">
					</div>
					<div class="form-group col-md-6">
						<label for="rua">
							<red>*</red>Logradouro</label>
						<input type="text" required name="rua" maxlength="255" placeholder="Rua, Av." class="form-control" id="input_rua">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Número e complemento</label>
						<input type="text" required name="numero" maxlength="255" placeholder="Número e complemento" class="form-control" id="input_numero">
					</div>
				</div>




				<div class="form-group">
					<label for="funcao">
						<red>*</red>Função</label>
					<select id="funcao" required name="funcao" class="form-control">
						<option hidden="true" value="" selected>Selecione a opção desejada</option>
						<option>Professor(a)</option>
						<option>Recepcionista</option>
					</select>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="salario">
							<red>*</red>Salário</label>
						<input type="text" required name="salario" class="form-control" id="salario" placeholder="R$">
					</div>
					<div class="form-group col-md-2">
						<label for="filial">
							<red>*</red>Filial</label>
						<select id="filial" required name="filial" class="form-control">
							<option value="">Selecione a opção desejada</option>
								<?php
								require( '../conectar.php' );
								$sql = "SELECT IdFilial, cidade, bairro, estado, rua, numero FROM filial";
								$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
								while ( $row = mysqli_fetch_array( $result ) ) {
									echo '<option value="'.$row['IdFilial'].'">' . $row[ 'rua' ] .', '.$row['numero'].', '.$row['bairro'].', '.$row['cidade'].', '.$row['estado']. '</option>';
								}
								mysqli_close( $conn );

								?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="input_senha">
							<red>*</red>Senha</label>
						<input type="password" maxlength="20" required name="senha" data-placement="bottom" data-animation="true" data-content="Insira uma senha com pelo menos 6 caracteres" class="form-control" id="senha" placeholder="Minimo de 8 caracteres">
					</div>
					<div class="form-group col-md-4">
						<label for="input_confsenha">
							<red>*</red>Confirme a senha</label>
						<input type="password" data-placement="bottom" data-animation="true" data-content="As senhas não conferem" maxlength="20" required name="confsenha" placeholder="Minimo de 8 caracteres" class="form-control" id="input_confsenha">

					</div>
					<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
				</div>


				<a class="btn btn-primary" href="consulta_colaborador">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
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
				$CampoValor.mask( '0000,00', {
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