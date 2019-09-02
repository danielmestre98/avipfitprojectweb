<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Editar evento</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
			$( "#ag_drop" ).slideDown( 200 );
			$( "#ger_agenda" ).addClass( "bg-dark active" );
			var $CampoHora = $( ".hora" );
			$CampoHora.mask( '00:00', {
				reverse: true
			} );
		} );

	} );
</script>
<?php 

require( '../conectar.php' );

$horaold = $_GET['horario'];
$filialold = $_GET['filial'];
$diaold = $_GET['dia'];

$resulted = mysqli_query( $conn, "SELECT dia, evento, horario, id FROM agenda WHERE horario = '$horaold' AND dia = '$diaold' AND filial = '$filialold'" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$hora = $row['horario'];
	$dia = $row['dia'];
	$evento = $row['evento'];
	$id = $row['id'];
}
?>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Edição de eventos</h1>
			<br>
			<form id="edit_event" action="../lib/editar_evento.php" enctype="multipart/form-data" method="post">
				<input type="text" name="horaold" id="horaold" hidden="true" value="<?php echo $horaold?>">
				<input type="text" name="diaold" id="diaold" hidden="true" value="<?php echo $diaold?>">
				<input type="number" name="filial" id="filial" hidden="true" value="<?php echo $filialold?>">
				<input type="number" name="id" id="id" hidden="true" value="<?php echo $id?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Evento</label>
						<select id="evento" required name="evento" class="form-control">
							<option selected><?php echo $evento?></option>
							<option>Avaliação física</option>
							<option>Aula experimental</option>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="descricao">
							<red>*</red>Dia da semana</label>
						<select id="dsemana" required name="dia" class="form-control">
							<option selected><?php echo $dia?></option>
							<option>Segunda</option>
							<option>Terça</option>
							<option>Quarta</option>
							<option>Quinta</option>
							<option>Sexta</option>
							<option>Sábado</option>
						</select>
					</div>
					<div class="form-group col-md-1">
						<label for="">
							<red>*</red>Horário</label>
						<input required value="<?php echo $hora?>" class="form-control hora" name="hora" type="text" placeholder="--:--">
					</div>
				</div>



				<a class="btn btn-primary" href="ag_eventos">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







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