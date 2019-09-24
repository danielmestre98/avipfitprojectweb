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
			$( "#depoimentos" ).addClass( "active" );
		} );
	} );
</script>
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<p><h1>Depoimentos</h1></p>
		<a class="btn btn-primary" href="novo_dep">Novo depoimento</a>
			<br>
			<br>
			<?php
			require( '../conectar.php' );
			$sql2 = "SELECT foto, p.nome, descricao FROM depoimentos d INNER JOIN pessoa p ON (d.cpf = p.cpf) WHERE d.status = 'Aprovado'";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
			
			while ( $row = mysqli_fetch_array( $result ) ) {
			?>
				<p><img src="../fotos/<?=$row['foto']?>" width="70" height="70" alt=""> <h3><?=$row['nome']?></h3></p>
				<p><?=$row['descricao']?></p>
				<br><br>
				
		
		
		
			<?php	
			}
			mysqli_close( $conn );

			?>


		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
</html>