<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo evento</title>
	<link rel="stylesheet" href="../css/reddot.css">
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
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


$cpf = $_SESSION['cpf'];

$resulted = mysqli_query( $conn, "SELECT p.cpf, IdFilial FROM pessoa p INNER JOIN funcionario f ON (p.cpf = f.cpf) WHERE p.cpf = '$cpf'" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$rastreio = $row['cpf'];
	$idfilial = $row['IdFilial'];
}
?>
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Cadastro de eventos</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para cadastrar um evento.</h5>
			<br>
			<form id="new_event" action="../lib/novo_evento.php" enctype="multipart/form-data" method="post">
				<input type="text" hidden="true" name="cpf" id="cpf" value="<?php echo $rastreio?>">
				
				<div class="form-row">
					<div class="form-group col-md-5">
						<label for="nomeExercicio">
							<red>*</red>Evento</label>
						<select id="evento" required name="evento" class="form-control">
							<option selected hidden="true" value="">Selecione a opção desejada</option>
							<option>Avaliação física</option>
							<option>Aula experimental</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="descricao">
							<red>*</red>Dia da semana</label>
						<select id="dsemana" required name="dsemana" class="form-control">
							<option selected value="" hidden="true">Selecione a opção desejada</option>
							<option>Segunda</option>
							<option>Terça</option>
							<option>Quarta</option>
							<option>Quinta</option>
							<option>Sexta</option>
							<option>Sábado</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="">
							<red>*</red>Horário de início</label>
						<input required class="form-control hora" type="text" id="hora" name="hora" placeholder="hh:mm">
					</div>
					<div class="form-group col-md-2">
						<label for="">
							<red>*</red>Horário de término</label>
						<input required class="form-control hora" type="text" id="horafim" name="horafim" placeholder="hh:mm">
					</div>
					<br>
					<p>Campos com <red>*</red> são obrigatórios.</p>
				</div>



				<a class="btn btn-primary" href="ag_eventos">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="../js/jquery.mask.js"></script>
	<script>
		
	</script>
	<script src="../js/select2.min.js" type="text/javascript"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>

</body>
</html>