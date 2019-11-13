<?php
include_once( 'nav.php' );
include( '../conectar.php' );
$resulted = mysqli_query( $conn, "SELECT * FROM pessoa ORDER BY cadastro asc limit 1" );
if ( mysqli_num_rows( $resulted ) === 1 ) {

	$row = mysqli_fetch_assoc( $resulted );

	$cadastro = $row[ 'cadastro' ];
}

$hoje = date( 'Y-m-d' );
$start = ( new DateTime( $cadastro ) )->modify( 'first day of this month' );
$end = ( new DateTime( $hoje ) )->modify( 'first day of next month' );
$interval = DateInterval::createFromDateString( '1 month' );
$period = new DatePeriod( $start, $interval, $end );



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
			<h1>Relatório institucional</h1>
			<br>
			<h5>Selecione o mês/ano de referência e verifique a quantidade de alunos cadastrados às modalidades de treinamento em conformidade com as filiais.</h5>
			<br>





			<form method="post" target="_blank" action="../mpdf/Relatorio.php">
				<div class="form-row">
					<div class="form-group col-md-3" style="float: right;">
						<label for="mes">Mês de referência</label>
						<select required class="form-control" name="data" id="data">
							<option value="">Selecione o mês de referência</option>
							<?php
							foreach ( $period as $dt ) {
								echo "<option>".$dt->format( "m/Y" ) . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<button style="float: left" type="submit" class="btn btn-primary btn-sm">Gerar PDF</button>
			</form>








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