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
		<div class="container-fluid p-5">
			<p>
				<h1>Depoimentos</h1>
			</p>
		<br>
		<h5>Confira os depoimentos dos alunos AVIPfit!</h5>
		<br>
			<?php
			require( '../conectar.php' );
			$sql2 = "SELECT foto, p.nome, descricao, data FROM depoimentos d INNER JOIN pessoa p ON (d.cpf = p.cpf) WHERE d.status = 'Aprovado' ORDER BY data ASC";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
			if ( mysqli_num_rows( $result ) < 1 ){
				echo "Não existem depoimentos registrados.";
			}
			while ( $row = mysqli_fetch_array( $result ) ) {
				$data = explode("-", $row['data']);
				list($ano, $mes, $dia) = $data;
				$data = "$dia/$mes/$ano";
			?>
				<p><img src="../fotos/<?=$row['foto']?>" width="70" height="70" alt=""> <h3><?=$row['nome']?> - <?=$data?></h3></p>
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