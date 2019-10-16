<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Mensalidade</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#mensalidades" ).addClass( "active" );
			
		} );

	} );
</script>
<?php 

require( '../conectar.php' );

$cpf = $_GET['cpf'];
$competencia = $_GET['comp'];

$resulted = mysqli_query( $conn, "SELECT nome, status FROM pagamentos pag INNER JOIN pessoa p ON (p.cpf = pag.cpf) WHERE p.cpf = '$cpf' AND competencia = '$competencia'" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$nome = $row['nome'];
	$status = $row['status'];
}
?>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Gerenciar mensalidade</h1>
			<br>
			<h5>Selecione o status da mensalidade e clique em Salvar. </h5>
			<br>
			<form id="edit_event" action="../lib/update_mensalidade.php" enctype="multipart/form-data" method="post">
				<input type="text" hidden="true" name="cpf" value="<?=$cpf?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nomeExercicio">
							Nome do aluno(a)</label>
					
						<input type="text" readonly name="nome" class="form-control" value="<?=$nome?>">
					</div>
					<div class="form-group col-md-1">
						<label for="descricao">
							Competência</label>
					
						<input type="text" readonly name="competencia" class="form-control" value="<?=$competencia?>">
					</div>
					<div class="form-group col-md-5">
						<label for="">
							<red>*</red>Status da mensalidade</label>
						<?php
						if ( $status === 'Pagamento efetuado' ) {
							echo '<select name="" disabled class="form-control" id="">';
						} else {
							echo '<select name="status" class="form-control" id="">';
						}
						?>

						<option>
							<?=$status?>
						</option>
						<option>Pagamento efetuado</option>

						</select>
					
					</div>
					
				</div>
				<p>Campos com <red>*</red> são obrigatórios</p>


				<a class="btn btn-primary" href="mensalidades">Voltar</a>
				<?php
				if ( $status === 'Pagamento efetuado' ) {

				} else {
					echo '<button type="submit" class="btn btn-primary float-right">Salvar</button>';
				}
				?>

			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>


	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>