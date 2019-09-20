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
			<h1>Agendamento de avaliação física</h1>
			<br>
			<?php 
			include ('../conectar.php');
			
			$hora = $_GET['horario'];
				
			$data = $_GET['data'];
			$datan = explode( "/", $data );

			list( $dia, $mes, $ano ) = $datan;

			$datan = "$ano-$mes-$dia";
				
			$sql = "SELECT a.data, a.horario, status, p.nome, descricaoCancelamento FROM agendamentoavalfisicamensal a INNER JOIN agendamento f ON (a.data = f.data and a.horario = f.horario) INNER JOIN pessoa p ON (a.cpf = p.cpf) WHERE a.data = '$datan' AND a.horario = '$hora'";
			//$sql = "SELECT a.data, a.horario, status, p.nome FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.data = f.data and a.horario = f.horario) INNER JOIN pessoa p ON (f.cpf = p.cpf) WHERE f.data = '$data' AND f.horario = '$hora'";
				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) == 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$status = $row['status'];
				$filial = $row['IdFilial'];
				$canc = $row['descricaoCancelamento'];
				
			}
				
			?>
			<form id="exercicio_cadastro" action="agendamentos" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-9">
						<label for="nomeExercicio">
							Nome</label>
					

						<input type="text" name="nomeExerciciou" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
					
					<div class="form-group col-md-2">
						<label for="descricao">
							Data</label>
					

						<input type="text" required readonly value="<?=$data?>" name="descricao" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-1">
						<label for="descricao">
							Hora</label>
					

						<input type="text" required readonly value="<?=$hora?>" name="descricao" class="form-control" id="descricao">
					</div>
				</div>
				
				<div class="form-row">
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade"><red>*</red>Aprovação</label>
						<select required disabled class="form-control" name="" id="aprovacao">
							<option><?=$status?></option>
							<option value="1">Aprovado</option>
							<option value="2">Cancelado</option>
						</select>
					</div>
					<?php if ($status == 'Cancelado'){?>
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>
					

						<textarea type="text" readonly name="nomeExercicio" rows="10" class="form-control" id=""><?=$canc?></textarea>
					</div><?php }?>
				</div>
				<p>Campos com <red>*</red> são obrigatórios</p>
				


				<a class="btn btn-primary" href="agendamento">Voltar</a>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>

<script type="text/javascript">
</script> 
	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>