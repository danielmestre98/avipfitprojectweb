<?php
include_once( 'nav.php' );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Aprovação</title>
	<link rel="stylesheet" href="../css/reddot.css">
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
			<h1>Depoimento</h1>
			<br>
			<?php 
			include ('../conectar.php');
			$cpf = $_GET['cpf'];
			
				
			$sql = "SELECT p.nome, descricao, status, p.foto FROM depoimentos d INNER JOIN pessoa p ON (p.cpf = d.cpf) WHERE d.cpf = '$cpf'";

				
			$resulted = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row['nome'];
				$status = $row['status'];
				$foto = $row['foto'];
				$desc = $row['descricao'];
				
			}?>
			<p><img src="../fotos/<?=$foto?>" width="70" height="70" alt=""></p>
			<form id="exercicio_cadastro" action="../lib/aprovacao_dep.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nomeExercicio">
							Nome</label>
							<input type="text" hidden="true" name="cpf" value="<?=$cpf?>"</input>
					<input type="text" name="nome" readonly value="<?=$nome?>" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="">Descrição</label>
						<textarea name="" class="form-control" id="" cols="30" readonly rows="10"><?=$desc?></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade"><red>*</red>Aprovação</label>
						<select required class="form-control" name="aprovacao" id="aprovacao">
							<option hidden="true" value=""><?=$status?></option>
							<option>Aprovado</option>
							<option>Cancelado</option>
						</select>
					</div>
				</div>



				<a class="btn btn-primary" href="novos_dep">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
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