<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Relatório</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#relatorio" ).addClass( "active" );
		} );
	} );
</script>
<link rel="stylesheet" href="../css/datatables.min.css">
<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Relatório de relação de alunos</h1>
			<br>





			<form action="../mpdf/Relatorio.php">
				<div class="form-row">
					<div class="form-group col-md-3" style="float: right;">
						<label for="mes">Mês de referência</label>
						<select required class="form-control" name="data" id="data">
							<option value="">Selecione o mês de referência</option>
							<option>09/2019</option>
						</select>
					</div>
				</div>
			</form>
			<button style="float: left" type="submit" class="btn btn-primary btn-sm">Gerar PDF</button>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="../js/moment.js"></script>
	<script src="../js/datatables.min.js"></script>
	<script src="../js/datetime.js"></script>
	<script src="../js/responsive.bootstrap4.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>

</body>
</html>