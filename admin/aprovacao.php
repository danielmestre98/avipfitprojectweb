<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Aprovação</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
			$( "#ag_drop" ).slideDown( 200 );
			$( "#ger_agendamentos" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<?php 
			include ('../conectar.php');
			$tipo = $_GET['tipo']; 
			$id = $_GET['id'];
			if ($tipo == 'Avaliação Física'){
			
				
				
			$sql = "SELECT a.data, f.horario, f.horafim, status, p.nome, f.IdFilial, a.id, p.email FROM agendamentoavalfisicamensal a INNER JOIN agendamento f ON (a.id = f.id) INNER JOIN pessoa p ON (a.cpf = p.cpf) WHERE a.id = '$id'";
			//$sql = "SELECT a.data, a.horario, status, p.nome FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.data = f.data and a.horario = f.horario) INNER JOIN pessoa p ON (f.cpf = p.cpf) WHERE f.data = '$data' AND f.horario = '$hora'";
				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$status = $row['status'];
				$hora = date( "H:i", strtotime( $row[ 'horario' ] ) );
				$data = $row['data'];
				$horafim = date( "H:i", strtotime( $row[ 'horafim' ] ) );
				$filial = $row['IdFilial'];
				$id = $row['id'];
				$email = $row['email'];
				
			}
				
			?>
			<h1>Aprovação de evento</h1>
			<br>
			<h5>Selecione a ação desejada e clique em Salvar.</h5>
			<br>
			<form id="exercicio_cadastro" action="../lib/aprovacao" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<input type="text" name="filial" hidden="true" value="<?=$filial?>">
					<div class="form-group col-md-8">
						<label for="nomeExercicio">
							Nome do aluno(a)</label>
					

<input type="text" hidden="true" name="id" value="<?=$id?>">
<input type="text" hidden="true" name="tipo" value="aval">

<input type="text" hidden="true" name="email" value="<?=$email?>">
						<input type="text" name="nome" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="">
					</div>

					<div class="form-group col-md-2">
						<label for="descricao">
							Data do agendamento</label>
					



						<input type="text" required readonly value="<?=$data?>" name="data" hidden="true" class="form-control" id="descricao">

						<input type="text" required readonly value="<?php echo date(" d/m/Y ", strtotime($data))?>" name="data2" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-2">
						<label for="descricao">
							Horário do agendamento</label>
					





						<input type="text" required readonly value="<?=$hora?> - <?=$horafim?>" name="hora" class="form-control" id="hora">
					</div>
				</div>

				<div class="form-row">

				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Status</label>
						<select required class="form-control" name="aprovacao" id="aprovacao">
							<option hidden="true">
								<?=$status?>
							</option>
							<option value="Aprovado">Aprovado</option>
							<option>Cancelado</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>


						<textarea maxlength="1022" type="text" name="cancelamento" rows="10" value="" required class="form-control" id=""></textarea>
					</div>
				</div>
				<p>Campos com
					<red>*</red> são obrigatórios</p>



				<a class="btn btn-primary" href="../admin/agendamentos">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>
			<?php }
			else{ if($tipo == 'Aula Experimental'){
			include ('../conectar.php');
				
				
			$sql = "SELECT a.data, f.horario, f.horafim, status, nome, telefone, email, modalidadeTreinamento, f.IdFilial FROM agendamentoaulaexp a INNER JOIN agendamento f ON (a.id = f.id) WHERE a.id = '$id'";
				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$filial = $row['IdFilial'];
				$status = $row['status'];
				$hora = date( "H:i", strtotime( $row[ 'horario' ] ) );
				$data = $row['data'];
				$horafim = date( "H:i", strtotime( $row[ 'horafim' ] ) );
				$telefone = $row['telefone'];
				$email = $row['email'];
				$treinamento = $row['modalidadeTreinamento'];	
				
			}
			
			?>

			<h1>Aprovação de evento</h1>
			<br>
			<h5>Selecione a ação desejada e clique em Salvar.</h5>
			<br>
			<form id="exercicio_cadastro" action="../lib/aprovacao.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<input type="text" name="filial" hidden="true" value="<?=$filial?>">
					<div class="form-group col-md-8">
						<label for="nomeExercicio">
							Nome do aluno(a)</label>
						<input type="text" name="nome" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="Nome">
						<input type="text" hidden="true" name="id" value="<?=$id?>">
						<input type="text" hidden="true" name="tipo" value="exp">
					</div>

					<div class="form-group col-md-2">
						<label for="descricao">
							Data do agendamento</label>
					


						<input type="text" required name="data" readonly hidden="true" value="<?=$data?>" name="descricao" class="form-control" id="descricao">
						<input type="text" required name="data2" readonly value="<?php echo date(" d/m/Y ", strtotime($data))?>" name="descricao" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-2">
						<label for="descricao">
							Horário do agendamento</label>
					



						<input type="text" required name="hora" readonly value="<?=$hora?> - <?=$horafim?>" name="hora" class="form-control" id="hora">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="email">
							E-mail para contato</label>
					



						<input type="text" required readonly value="<?=$email?>" name="email" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-3">
						<label for="telefone">
							Telefone para contato</label>
					



						<input type="text" required readonly value="<?=$telefone?>" name="telefone" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-3">
						<label for="treinamento">
							Treinamento</label>
					



						<input type="text" readonly value="<?=$treinamento?>" name="treinamento" class="form-control" id="descricao">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Status</label>
						<select required class="form-control" name="aprovacao" id="aprovacao">
							<option hidden="true"><?=$status?></option>
							<option value="Aprovado">Aprovado</option>
							<option>Cancelado</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>


						<textarea maxlength="1022" type="text" name="cancelamento" rows="10" value="" required class="form-control" id=""></textarea>
					</div>
					<br>

				</div>
				<p>Campos com
					<red>*</red> são obrigatórios.</p>



				<a class="btn btn-primary" href="agendamentos">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>

			<?php }}?>




		</div>
	</main>
	<!-- page-content" -->
	</div>

	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>

	<script type="text/javascript">
		$( document ).ready( function () {
			$( '#cancelar' ).hide();
			$( '#aprovacao' ).change( function () {
				if ( $( '#aprovacao' ).val() == 'Aprovado' ) {
					$( '#cancelar' ).hide();
				} else {
					$( '#cancelar' ).show();
				}
			} );
		} );
	</script>
</body>
</html>