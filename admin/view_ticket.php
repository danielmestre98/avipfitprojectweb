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
			$( "#ajuda" ).addClass( "active" );
			$( "#ajuda_drop" ).slideDown( 200 );
			$( "#tickets" ).addClass( "bg-dark active" )
		} );
	} );
</script>
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<p><h1 align="center">Problema</h1></p>
			<br>
			
			<p> <img src="../fotos/padrao.jpg" width="70" height="70" alt=""><h4>Daniel Mestre Loureiro - 05/06/2019 16:13h</h4></p>

			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
			<p><h5>Arquivo em anexo <a href="#">Clique aqui</a> para baixar</h5></p>
	<br>
			<p align="right"><h4 align="right">Suporte - 06/06/2019 08:48h</h4></p>
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
			<br>

			<div class="form-group col-md-12">
				<label for="">Resposta</label>
						<textarea name="" class="form-control" id="" cols="30" rows="6" required placeholder="Digite aqui sua resposta" rows="10"></textarea>
					</div>
			<div class="form-group col-md-12">
						<label for="cidade">Anexar arquivos (Formatos: jpg, jpeg, png)</label>
						<input type="file" name="foto" class="form-control-file" id="foto">
					</div>
			<a href="tickets" class="btn btn-primary">Voltar</a>
			<a href="#" style="float: right" class="btn btn-primary">Enviar resposta</a>


		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
</html>