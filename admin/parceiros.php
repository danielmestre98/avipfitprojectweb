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
		<div class="container-fluid p-5">
			<p>
				<h1>Parceiros</h1>
			</p>
			<br>
			<h5>Registre parceiros ou pesquise por parceiros cadastrados para atualizar informações.</h5>
			<br>
			<a class="btn btn-primary" href="novo_parceiro">Novo <i class="fas fa-plus"></i></a>
			<br>
			<br>
			<div class="form-row">
				<?php
				require( '../conectar.php' );
				$sql2 = "SELECT telefone, cidade, cep, bairro, estado, rua, numero, nome, foto, cnpj FROM parceiro ORDER BY nome ASC";

				$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
				if ( mysqli_num_rows( $result ) == 0 ) {
					echo "Não existem organizações parceiras cadastradas. ";
				}
				while ( $row = mysqli_fetch_array( $result ) ) {
					?>
				<div class="form-group col-md-4">
					<p><img class="img-thumbnail" style="max-width: 100%; height: 180px;" src="../fotos/<?=$row['foto']?>" alt="">
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
					<p>Telefone:
						<?=$row['telefone']?>
					</p>
					<div class="align-bottom">
						<a class="btn btn-primary btn-sm" href="editar_parceiro?cnpj=<?=$row['cnpj']?>">Editar <i class="fas fa-edit"></i></a>
						<button class="btn btn-primary btn-sm" onClick="confirma('<?=$row['cnpj']?>', '<?=$row['nome']?>')">Excluir <i class="far fa-trash-alt"></i></button>
					</div>
				</div>


				<?php
				}
				mysqli_close( $conn );

				?>
			</div>



		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
<script>
	function confirma( escolha, nome ) {
		if ( window.confirm( " Deseja deletar o parceiro " + nome + "?" ) ) {
			window.location = "../lib/deletar_parceiro?cnpj=" + escolha
		} else {
			return false

		}
	}
</script>
</html>