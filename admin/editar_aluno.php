<?php
include_once( 'nav.php' );
require( '../lib/editar_aluno_show.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Editar aluno</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#cadastro" ).addClass( "active" );
			$( "#cad_drop" ).slideDown( 200 );
			$( "#cad_aluno" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Edição de aluno</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para atualizar o cadastro de um aluno.</h5>
			<br>
			<form id="aluno_editar" action="../lib/editar_aluno.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">
							<red>*</red>Nome</label>
						<input type="text" name="nome" maxlength="255" required class="form-control" value="<?php echo $nome?>" id="input_nome" placeholder="Nome">
					</div>
					<input type="text" hidden="true" name="cpfOld" id="cpfOLD" value="<?php echo $_GET['cpf']?>">
					<div class="form-group col-md-3">
						<label for="cpf">
							<red>*</red>CPF</label>
						<input type="text" required name="cpf" data-placement="bottom" data-animation="true" data-content="CPF inválido" value="<?php echo $cpf?>" class="form-control" id="input_CPF" placeholder="___.___.___-__">
					</div>
					<div class="form-group col-md-3">
						<label for="sexo"><red>*</red>Sexo</label>
						<select class="form-control" name="sexo" id="sexo">
							<option hidden="true" selected><?=$sexo?></option>
							<option>Masculino</option>
							<option>Feminino</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="email"><red>*</red>E-mail</label>
						<input type="email" required name="email" maxlength="50" value="<?php echo $email?>" class="form-control" id="email" placeholder="exemplo@exemplo.com">
					</div>
					<div class="form-group col-md-4">
						<label for="telefone">
							<red>*</red>Telefone</label>
						<input type="text" required name="telefone" value="<?php echo $telefone?>" class="form-control" id="input_telefone" placeholder="(19) 999999999">
					</div>
					<div class="form-group col-md-2">
						<label for="nasc">
							<red>*</red>Data de nascimento</label>
						<input required name="nascimento" type="date" value="<?php echo $nascimento?>" class="form-control" id="input_nasc">
					</div>
				</div>
				<div class="form-group">
					<label for="foto">Adicione uma foto ao perfil do aluno, os formatos admitidos são jpg, jpeg e png.</label>
					<input type="file" name="foto" class="form-control-file" id="foto">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Cidade</label>
						<input type="text" required name="cidade" placeholder="Cidade" maxlength="255" value="<?php echo $cidade?>" class="form-control" id="input_cidade">
					</div>
					<div class="form-group col-md-4">
						<label for="estado">
							<red>*</red>Estado</label>
						<input type="text" required name="estado" placeholder="Estado" maxlength="255" value="<?php echo $estado?>" class="form-control" id="input_estado">
					</div>
					<div class="form-group col-md-2">
						<label for="cep">
							CEP</label>
					
						<input type="text" name="cep" placeholder="_____-___" value="<?php echo $cep?>" class="form-control" id="input_cep">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="bairro">
							<red>*</red>Bairro</label>
						<input type="text" required name="bairro" placeholder="Bairro" maxlength="255" value="<?php echo $bairro?>" class="form-control" id="input_bairro">
					</div>
					<div class="form-group col-md-6">
						<label for="rua">
							<red>*</red>Logradouro</label>
						<input type="text" required name="rua" maxlength="255" placeholder="Rua, Av." value="<?php echo $rua?>" class="form-control" id="input_rua">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">
							<red>*</red>Número e complemento</label>
						<input type="text" required name="numero" placeholder="Número e complemento" maxlength="35" value="<?php echo $numero?>" class="form-control" id="input_numero">
					</div>
				</div>




				<div class="form-group">
					<label for="inputState">
						<red>*</red>Treinamento</label>
					<select id="treinamento" required name="treinamento" class="form-control">
						<option selected hidden="true" value="<?php echo $treinamento?>"><?php echo $treinamento?></option>
								<?php
								require( '../conectar.php' );
								$sql = "Select NomeTreinamento FROM treinamento WHERE Id != '9'";
								$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
								while ( $row = mysqli_fetch_array( $result ) ) {
									echo '<option>' . $row[ 'NomeTreinamento' ] . '</option>';
								}
								mysqli_close( $conn );

								?>
					</select>
				
				</div>
				Preencha o horário aos dias da semana em que o aluno frequentará o studio.
				<div class="form-row">
					<div class="form-group col-md-1">
						<label for="segunda">Segunda</label>
						<input type="text" name="segunda" value="<?php echo $segunda?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-lg-1">
						<label for="terca">Terça</label>
						<input type="text" name="terca" value="<?php echo $terca?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-1">
						<label for="quarta">Quarta</label>
						<input type="text" name="quarta" value="<?php echo $quarta?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-1">
						<label for="quinta">Quinta</label>
						<input type="text" name="quinta" value="<?php echo $quinta?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-1">
						<label for="sexta">Sexta</label>
						<input type="text" name="sexta" value="<?php echo $sexta?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-1">
						<label for="sabado">Sábado</label>
						<input type="text" name="sabado" value="<?php echo $sabado?>" class="form-control hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-6">
						<label for="filial">
							<red>*</red>Filial</label>
						<select id="filial" required name="filial" class="form-control">
							<option hidden="true" selected value="<?php echo $idfilial?>"><?php echo "$frua, $fnum, $fbairro, $fcidade, $festado"?></option>
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


				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="mensalidade">
							<red>*</red>Valor da mensalidade</label>
						<input type="text" required name="mensalidade" value="<?php echo $valor?>" class="form-control" id="mensalidade" placeholder="R$">
					</div>
					<div class="form-group col-md-2">
						<label for="pagamento">
							<red>*</red>Data de pagamento</label>
						<input id="pagamento" required name="pagamento" value="<?php echo $vencimento?>" class="form-control" maxlength="2" placeholder="dd">
					</div>
					<div class="form-group col-md-4">
						<label for="input_senha">
							<red></red>Senha</label>
						<input type="password" disabled name="senha" value="********" data-placement="bottom" data-animation="true" data-content="Insira uma senha com pelo menos 8 caracteres" class="form-control" id="senha" placeholder="Mínimo 8 caracteres">
					</div>
					<div class="form-group col-md-4">
						<label for="input_confsenha">
							<red></red>Confirme a senha</label>
						<input type="password" placeholder="Mínimo 8 caracteres" value="********" disabled data-placement="bottom" data-animation="true" data-content="As senhas não conferem" name="confsenha" class="form-control" id="input_confsenha">

					</div>
					<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
				</div>


				<a class="btn btn-primary" href="consulta_aluno.php">Voltar</a>
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

				var $datamens = $("#pagamento");
				$datamens.mask('00',{
					reverse: false
				});
				
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

				var $CampoValor = $( "#mensalidade" );
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