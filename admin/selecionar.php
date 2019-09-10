<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#mensalidades" ).addClass( "active" );

			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Mensalidades</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<?php
	include ('../conectar.php');
	$sql = "SELECT EXTRACT(YEAR FROM cadastro) AS ano FROM pessoa WHERE tipoPessoa = '2' GROUP BY cadastro";
	$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
	mysqli_close( $conn );	
	$year = date("Y");
	?>
	
	
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1 align="center">Mensalidades</h1>
			<div class="form-row">
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Mês de referência</label>
					<select class="form-control" name="" id="">
						<option value="">Selecione o mês</option>
						<option>Janeiro</option>
						<option>Fevereiro</option>
						<option>Março</option>
						<option>Abril</option>
						<option>Maio</option>
						<option>Junho</option>
						<option>Julho</option>
						<option>Agosto</option>
						<option>Setembro</option>
						<option>Outubro</option>
						<option>Novembro</option>
						<option>Dezembro</option>
					</select>
				</div>
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Ano de referência</label>
					<select class="form-control" name="" id="">
						<?php
						for ($ano = 2019; $ano <= $year; $ano++){
							echo '<option>'. $ano . '</option>';
						}
						?>
					</select>
				</div>
			</div>
</body>

</html>