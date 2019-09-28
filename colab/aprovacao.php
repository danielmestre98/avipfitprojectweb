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
			if ($tipo == 'Avaliação Física'){
			$hora = $_GET['horario'];
				
			$data = $_GET['data'];
				
			$sql = "SELECT a.data, a.horario, status, p.nome, f.IdFilial FROM agendamentoavalfisicamensal a INNER JOIN agendamento f ON (a.data = f.data and a.horario = f.horario) INNER JOIN pessoa p ON (a.cpf = p.cpf) WHERE a.data = '$data' AND a.horario = '$hora'";
			//$sql = "SELECT a.data, a.horario, status, p.nome FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.data = f.data and a.horario = f.horario) INNER JOIN pessoa p ON (f.cpf = p.cpf) WHERE f.data = '$data' AND f.horario = '$hora'";
				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$status = $row['status'];
				$filial = $row['IdFilial'];
				
			}
				
			?>
			<h1>Controle de agendamento de avaliação física</h1>
			<br>
			<form id="exercicio_cadastro" action="../lib/aprovacao" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<input type="text" name="filial" hidden="true" value="<?=$filial?>">
					<div class="form-group col-md-9">
						<label for="nomeExercicio">
							Nome</label>
					





						<input type="text" name="nome" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="">
					</div>

					<div class="form-group col-md-2">
						<label for="descricao">
							Data</label>
					



						<input type="text" required readonly value="<?=$data?>" name="data" hidden="true" class="form-control" id="descricao">

						<input type="text" required readonly value="<?php echo date(" d/m/Y ", strtotime($data))?>" name="data2" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-1">
						<label for="descricao">
							Hora</label>
					





						<input type="text" required readonly value="<?=$hora?>" name="hora" class="form-control" id="hora">
					</div>
				</div>

				<div class="form-row">

				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Aprovação</label>
						<select required class="form-control" name="aprovacao" id="aprovacao">
							<option hidden="true" value="">
								<?=$status?>
							</option>
							<option value="Aprovado">Aprovado</option>
							<option>Cancelado</option>
						</select>
					</div>
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>


						<textarea type="text" name="cancelamento" rows="10" value="" required class="form-control" id=""></textarea>
					</div>
				</div>
				<p>Campos com
					<red>*</red> são obrigatórios</p>



				<a class="btn btn-primary" href="agendamentos">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>
			<?php }
			else{ if($tipo == 'Aula Experimental'){
			include ('../conectar.php');
			
			$hora = $_GET['horario'];
				
			$data = $_GET['data'];
				
			$sql = "SELECT a.data, a.horario, status, nome, telefone, email, modalidadeTreinamento, f.IdFilial FROM agendamentoaulaexp a INNER JOIN agendamento f ON (a.data = f.data and a.horario = f.horario) WHERE a.data = '$data' AND a.horario = '$hora'";
				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$filial = $row['IdFilial'];
				$status = $row['status'];
				$telefone = $row['telefone'];
				$email = $row['email'];
				$treinamento = $row['modalidadeTreinamento'];	
				
			}
			
			?>

			<h1>Controle de agendamento de aula experimental</h1>
			<br>
			<form id="exercicio_cadastro" action="../lib/aprovacao.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<input type="text" name="filial" hidden="true" value="<?=$filial?>">
					<div class="form-group col-md-9">
						<label for="nomeExercicio">
							Nome</label>
						<input type="text" name="nome" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>

					<div class="form-group col-md-2">
						<label for="descricao">
							Data</label>
					


						<input type="text" required name="data" readonly hidden="true" value="<?=$data?>" name="descricao" class="form-control" id="descricao">
						<input type="text" required name="data2" readonly value="<?php echo date(" d/m/Y ", strtotime($data))?>" name="descricao" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-1">
						<label for="descricao">
							Hora</label>
					



						<input type="text" required name="hora" readonly value="<?=$hora?>" name="hora" class="form-control" id="hora">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="email">
							Email</label>
					



						<input type="text" required readonly value="<?=$email?>" name="email" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-3">
						<label for="telefone">
							Telefone</label>
					



						<input type="text" required readonly value="<?=$telefone?>" name="telefone" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-3">
						<label for="treinamento">
							Treinamento</label>
					



						<input type="text" required readonly value="<?=$treinamento?>" name="treinamento" class="form-control" id="descricao">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade">
							<red>*</red>Aprovação</label>
						<select required class="form-control" name="aprovacao" id="aprovacao">
							<option value="" hidden="true"><?=$status?></option>
							<option value="Aprovado">Aprovado</option>
							<option>Cancelado</option>
						</select>
					</div>
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>


						<textarea type="text" name="cancelamento" rows="10" value="" required class="form-control" id=""></textarea>
					</div>
					<br>

				</div>
				<p>Campos com
					<red>*</red> são obrigatórios</p>



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
			var $CampoHora = $( "#hora" );
			$CampoHora.mask( '00:00', {
				reverse: false
			} );
		} );
	</script>
</body>
</html>