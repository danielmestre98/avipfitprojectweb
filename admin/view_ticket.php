<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit</title>
	<link rel="stylesheet" href="../css/reddot.css">
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
$resulted = mysqli_query( $conn, "SELECT titulo, usuario, foto, nome, status FROM ticket INNER JOIN pessoa ON (usuario = cpf) WHERE '$id' = id" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	$row = mysqli_fetch_assoc( $resulted );
	$titulo = $row[ 'titulo' ];
	$user = $row[ 'usuario' ];
	$foto = $row[ 'foto' ];
	$nome = $row[ 'nome' ];
	$status = $row['status'];

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
			if ($status != "Fechado"){
			?>
	<form id="new_ticket" method="post" action="../lib/responder_ticketUser" enctype="multipart/form-data" >
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for=""><red>*</red>Comentário</label>
				<textarea name="desc" class="form-control" id="desc" cols="30" maxlength="1022" rows="6" required placeholder="Digite aqui seu comentário" rows="10"></textarea>
				<input type="text" hidden="true" name="id" value="<?=$id?>">
				<p>Os campos com <red>*</red> são obrigatórios.</p>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="cidade">Adicione uma imagem como evidência do ticket, os formatos admitidos são jpg, jpeg e png.</label>
				<input type="file" name="foto" class="form-control-file" id="foto">
			</div>
		</div>
		<br>
		<p>Campos com <red>*</red> são obrigatórios.</p>
		<button style="float: right" type="submit" class="btn btn-primary">Enviar comentário</button>
		</form>
		<?php }?>	
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