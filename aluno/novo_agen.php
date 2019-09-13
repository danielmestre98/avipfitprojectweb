<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Agendamento</title>
	<link rel="stylesheet" href="../css/reddot.css">
	<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Agendamento de avaliação física</h1>
			<br>
			<form id="exercicio_cadastro" action="agendamento" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="nomeExercicio">
							<red>*</red>Data do agendamento</label>
						<input id="datepicker" />
					</div>
					<div class="form-group col-md-2">
						<label for="descricao"><red>*</red>Horario</label>
						<select required class="form-control" name="" id="">
							<option value=""></option>
							<option  value="">13:00</option>
							<option value="">14:00</option>
						</select>
					</div>
					<br>
	
				</div>

				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
				<br>
				<a href="agendamento" class="btn btn-primary">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>

	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="../js/jquery.mask.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
	<?php 
			$sql = "SELECT dia FROM agenda GROUP BY dia";
			$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
			$row = mysqli_fetch_assoc($result);
			$weekDays = explode(',', $row['dia']);
			$dias = [];
			foreach ($weekDays as $d) {
				if ($d == 'Domingo') $dias[] = 0;
				if ($d == 'Segunda') $dias[] = 1;
				if ($d == 'Terça') $dias[] = 2;
				if ($d == 'Quarta') $dias[] = 3;
				if ($d == 'Quinta') $dias[] = 4;
				if ($d == 'Sexta') $dias[] = 5;
				if ($d == 'Sábado') $dias[] = 6;
			}
		echo '<script type="text/javascript">var dias='.json_encode($dias).'</script>';
		?>
	  <script>

        $('#datepicker').datepicker({
			beforeShowDay: function (date) {
      		return [dias.indexOf(date.getDay()) > -1];
  			},
            uiLibrary: 'bootstrap4',
			locale: 'pt-br'
        });
    </script>
</body>
</html>