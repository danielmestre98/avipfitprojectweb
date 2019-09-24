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
			$( "#parceiros" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<p>
				<h1>Parceiros</h1>
			</p>
			<br>
			<br>
			<?php
			require( 'conectar.php' );
			$sql2 = "SELECT telefone, cidade, cep, bairro, estado, rua, numero, nome, foto FROM parceiro";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<p><img src="fotos/<?=$row['foto']?>" alt="" width="70" height="70">
				<h3>
					<?=$row['nome'] ?>
				</h3>
			</p>
			<p>
				<?=$row['rua']?>,
				<?=$row['numero']?>-
				<?=$row['bairro']?>,
				<?=$row['cidade']?>-
				<?=$row['estado']?>,
				<?=$row['cep']?>
			</p>
			<p>Telefone
				<?=$row['telefone']?>
			</p>
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