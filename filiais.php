<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit</title>
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#filiais" ).addClass( "active" );
		} );
	} );
</script>
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<p><h1>Filiais</h1></p>
			<br>
			<h5>Filiais AVIPfit e suas localizações.</h5>
			<br>
			<?php
			require( 'conectar.php' );
			$sql2 = "SELECT telefone, cidade, cep, bairro, estado, rua, numero FROM filial ORDER BY cidade ASC";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
			
			while ( $row = mysqli_fetch_array( $result ) ) {
			?>
				<p><h3><?=$row['cidade'] ?></h3></p>
				<p><?=$row['rua']?>, <?=$row['numero']?> - <?=$row['bairro']?>, <?=$row['cidade']?> - <?=$row['estado']?>, <?=$row['cep']?></p>
				<p>Telefone: <?=$row['telefone']?></p>
				<br><br>
				
		
		
		
			<?php	
			}
			mysqli_close( $conn );

			?>
<p><img src="../img/mapa.png" width="50%" alt=""></p>

		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
</html>