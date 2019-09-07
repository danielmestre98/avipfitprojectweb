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
			<p><h1>Parceiros</h1></p>
		
		<a class="btn btn-primary" href="novo_parceiro">Novo <i class="fas fa-plus"></i></a>
			<br>
			<br>
		<?php
			require( '../conectar.php' );
			$sql2 = "SELECT telefone, cidade, cep, bairro, estado, rua, numero, nome, foto, cnpj FROM parceiro";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
			
			while ( $row = mysqli_fetch_array( $result ) ) {
			?>
				<p><img width="70" height="70" src="../fotos/<?=$row['foto']?>" alt=""><h3><?=$row['nome'] ?></h3></p>
				<p><?=$row['rua']?>, <?=$row['numero']?> - <?=$row['bairro']?>, <?=$row['cidade']?> - <?=$row['estado']?>, <?=$row['cep']?></p>
				<p>Telefone: <?=$row['telefone']?></p>
				<a class="btn btn-primary btn-sm" href="editar_parceiro?cnpj=<?=$row['cnpj']?>">Editar <i class="fas fa-edit"></i></a>
				<button class="btn btn-primary btn-sm" onClick="confirma('<?=$row['cnpj']?>')">Excluir <i class="far fa-trash-alt"></i></button>	
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
	<script>
		function confirma(escolha){
			if ( window.confirm( " Tem certeza que deseja excluir esse parceiro?" ) ) {
					window.location="../lib/deletar_parceiro?cnpj="+escolha
			} else {
				return false
				
			}
		}
	</script>
</html>