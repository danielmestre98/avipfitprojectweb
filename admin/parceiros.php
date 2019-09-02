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
			<p><h1 align="center">Parceiros</h1></p>
		<a class="btn btn-primary" href="novo_parceiro">Novo <i class="fas fa-plus"></i></a>
			<br>
			<br>
			<p><img src="../fotos/padrao.jpg" width="70" height="70" alt=""> <h3>Centro de estética</h3></p>

			<p>Av. de Cillo, 1500 - Novo Mundo, Americana - SP, 13588-270</p>
			<p>Telefone: (19) 3875-9878</p>
	<a class="btn btn-primary btn-sm" href="editar_parceiro">Editar <i class="fas fa-edit"></i></a> <button class="btn btn-primary btn-sm" onClick="confirma()">Excluir <i class="far fa-trash-alt"></i></button>


		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
	<script>
		function confirma(){
			if ( window.confirm( " Tem certeza que deseja excluir esse parceiro?" ) ) {
					window.location="parceiros"
			} else {
				return false
				
			}
		}
	</script>
</html>