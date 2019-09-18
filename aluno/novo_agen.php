<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Agendamento</title>
	<link rel="stylesheet" href="../css/reddot.css">
	<link rel="stylesheet" href="../css/gijgo.min.css">
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
			<form id="exercicio_cadastro" action="../lib/salvar_ag_aval" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="nomeExercicio">
							<red>*</red>Data do agendamento</label>
						<input style="cursor:pointer; background-color: #FFFFFF" readonly autocomplete="off" required name="dia" id="datepicker"/>
					</div>
					<div class="form-group col-md-2">
						<label for="descricao">
							<red>*</red>Horario</label>
						<select name = "hora" required class="form-control" name="" id="horario">
							<option value="">Selecione a opção desejada</option>
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

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="../js/jquery.mask.js"></script>
	<script src="../js/gijgo.min.js"></script>
	<script src="../js/messages/messages.pt-br.min.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
	<?php 
			$sql = "SELECT dia FROM agenda WHERE evento = 'Avaliação física' GROUP BY dia";
			$dias = [];
				$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
				while ( $row = mysqli_fetch_array( $result ) ) {
					if ($row['dia'] == 'Domingo') $dias[] = 0;
					if ($row['dia'] == 'Segunda') $dias[] = 1;
					if ($row['dia'] == 'Terça') $dias[] = 2;
					if ($row['dia'] == 'Quarta') $dias[] = 3;
					if ($row['dia'] == 'Quinta') $dias[] = 4;
					if ($row['dia'] == 'Sexta') $dias[] = 5;
					if ($row['dia'] == 'Sábado') $dias[] = 6;
				}
				mysqli_close( $conn );

				$diasn = [0,1,2,3,4,5,6];
				$disable = array_diff($diasn, $dias);
				$disable = array_values($disable);
				
		echo '<script type="text/javascript">var $dias='.json_encode($disable).'</script>';
		?>
	<script>
		$( '#datepicker' ).datepicker( {
			disableDaysOfWeek: $dias,
			uiLibrary: 'bootstrap4',
		    format: 'dd/mm/yyyy', 
			locale: 'pt-br',
			change: function ( e ) {
				var $datepicker = $('#datepicker').datepicker();
				$.getJSON( '../lib/consulta_ag_aval.php?dia='+$datepicker.value(), function ( dados ) {
					
					if ( dados.length > 0 ) {
						$('#horario').empty();
						var option = '<option value="">Selecione o horário desejado</option>';
						$.each(dados, function(i, obj){
							option += '<option value="'+obj+'">'+obj+'</option>';
						})
						$('#horario').html(option).show(); 
					}

				} )
			}
		} );
	</script>
</body>
</html>