<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/reddot.css">
	<title>AVIPfit</title>
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#ajuda" ).addClass( "active" );
			$( "#ajuda_drop" ).slideDown( 200 );
			$( "#tickets" ).addClass( "bg-dark active" )
		} );
	} );
</script>
<?php
require( '../conectar.php' );
$id = $_GET[ 'id' ];
$resulted = mysqli_query( $conn, "SELECT titulo, status, prioridade, classificacao, usuario, foto, nome FROM ticket INNER JOIN pessoa ON (usuario = cpf) WHERE '$id' = id" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	$row = mysqli_fetch_assoc( $resulted );
	$titulo = $row[ 'titulo' ];
	$user = $row[ 'usuario' ];
	$foto = $row[ 'foto' ];
	$status = $row['status'];
	$prioridade = $row['prioridade'];
	$classificacao = $row['classificacao'];
	$nome = $row[ 'nome' ];

}
mysqli_close( $conn );
?>


<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">

			<br>
			<?php
			include( '../conectar.php' );
			$sql2 = "SELECT * FROM ticketRespostas where ticket = '$id'";
			$result = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
			while ( $row = mysqli_fetch_array( $result ) ) {
				if ( $row[ 'tipo' ] === 'User' ) {
					?>
			<p><img src="../fotos/<?=$foto?>" alt="" width="70" height="70">
				<h4>
					<?=$nome?> -
					<?php echo date('d/m/Y H:i', strtotime($row['datahora']));?>h</h4>
			</p>
			<p><h5><?=$titulo?></h5></p>
			<p>
				<?=$row['descricao']?>
			</p>
			<?php if(!empty($row['imagem'])){?>
			<p>Há um arquivo em anexo <a href="../tickets/<?=$row['imagem']?>" download>Clique aqui</a> para fazer o download.</p>
			<?php }?>
			<br><br>




			<?php
			} else {
				if ( $row[ 'tipo' ] === 'Suporte' ) {
					?>
			<p>
				<h4>Suporte - <?php echo date('d/m/Y H:i', strtotime($row['datahora']));?>h</h4>
			</p>
			<p><h5><?=$titulo?></h5></p>
			<p>
				<?=$row['descricao']?>
			</p>
			<?php if(!empty($row['imagem'])){?>
			<p>Há um arquivo em anexo <a href="../tickets/<?=$row['imagem']?>" download>Clique aqui</a> para fazer o download.</p>

			<?php }?>
		<br><br>
			<?php 					}
				}
			}
			mysqli_close( $conn );

			?>
			<form id="new_ticket" method="post" action="../lib/responder_ticketSuporte" enctype="multipart/form-data">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="">Classificação</label>
						<select class="form-control" required name="class" id="class">
							
								<?php 
								echo "<option hidden='true' selected>".$classificacao."</option>";
								?>
							
							<option>Solicitação</option>
							<option>Dúvida</option>
							<option>Incidente</option>

						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="">Prioridade</label>
						<select class="form-control" required name="prioridade" id="prioridade">
							<?php 	
								echo "<option hidden='true' selected>".$prioridade."</option>";
							?>
							<option>Baixa</option>
							<option>Média</option>
							<option>Alta</option>

						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="">Status</label>
						<select class="form-control" required name="status" id="status">
							<option hidden="true">
								<?=$status?>
							</option>
							<option>Aberto</option>
							<option>Em progresso</option>
							<option>Em revisão</option>
							<option>Fechado</option>

						</select>
					</div>
				</div>
				<div class="form-row">
					<input type="text" hidden="true" name="id" value="<?=$id?>">
					<div class="form-group col-md-12">
						<label for=""><red>*</red>Comentário</label>
						<textarea name="desc" class="form-control" id="desc" maxlength="1022" cols="35" rows="6" required placeholder="Digite aqui sua resposta"></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="cidade">Adicione uma imagem ao comentário do ticket, os formatos admitidos são jpg, jpeg e png.</label>
						<input type="file" name="foto" class="form-control-file" id="foto">
					</div>
				</div>
				<p>Campos com <red>*</red> são obrigatórios.</p>
				<button style="float: right" type="submit" class="btn btn-primary">Enviar comentário</button>
			</form>

			<a href="tickets" class="btn btn-primary">Voltar</a>


		</div>
	</main>
	<!-- page-content" -->
	</div>
	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
	<!-- page-content" -->
</body>
</html>