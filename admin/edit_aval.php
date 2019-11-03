<?php
include_once( 'nav.php' );
include('../lib/editar_aval_show.php')
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Novo avaliação física</title>
	<link rel="stylesheet" href="../css/reddot.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#aval_fisica" ).addClass( "active" );
			
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Avaliação física</h1>
			<br>
			<form id="avalfisica" action="../lib/editar_aval.php?id=<?=$_GET['id']?>" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="aluno">
							Aluno</label>
						<input type="text" disabled class="form-control" value="<?=$row['nome'];?>">
					</div>
					<div class="form-group col-md-6">
						<label for="protocolo">
							<red>*</red>Protocolo</label>
						<select id="protocolo" required name="protocolo" class="form-control">
							<option hidden="true" value="<?=$row['protocolo']?>"><?=$protocolo?></option>
							<option value="1">Pollock 7 dobras</option>
							<option value="2">Pollock 3 dobras</option>
							<option value="3">Petroski 4 dobras</option>
							<option value="4">Circ weltman (obesos)</option>
							<option value="5">Durnin & Womersley 17 a 29 anos</option>
							<option value="6">Durnin & Womersley 20 a 29 anos</option>
							<option value="7">Durnin & Womersley 30 a 39 anos</option>
							<option value="8">Durnin & Womersley 40 a 49 anos</option>
							<option value="9">Durnin & Womersley 50 a 72 anos</option>
							<option value="10">Durnin & Womersley 17 a 72 anos</option>
							
						</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="descricao"><red>*</red>Massa corporal (Kg)</label>
						<input type="text" required name="massa" value="<?=$row['massaCorporal']?>" class="form-control medida" id="massa">
					</div>
					<div class="form-group col-md-3">
						<label for="gordura"><red>*</red>Estatura (cm)</label>
						<input type="text" required name="estatura" value="<?=$row['estatura']?>" class="form-control" id="estatura">
					</div>
					<div class="form-group col-md-3">
						<label for="peso"><red>*</red>Cintura</label>
						<input type="text" required name="cintura" value="<?=$row['cintura'] ?>" class="form-control medida" id="cintura">
					</div>
					<div class="form-group col-md-3">
						<label for="coxa"><red>*</red>Quadril</label>
						<input type="text" required name="quadril" value="<?=$row['quadril'] ?>" class="form-control medida" id="quadril">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Subescapular</label>
						<input type="text" required name="subescapular" value="<?=$row['subescapular'] ?>" class="form-control medida" id="subescapular">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Tríceps</label>
						<input type="text" required name="triceps" value="<?=$row['triceps'] ?>" class="form-control medida" id="triceps">
					</div>
					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Bíceps</label>
						<input type="text" required name="biceps" value="<?=$row['biceps'] ?>" class="form-control medida" id="biceps">
					</div>
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Axilar Medial</label>
						<input type="text" required name="axilarmed" value="<?=$row['axilarMedial'] ?>" class="form-control medida" id="axilarmed">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Peitoral</label>
						<input type="text" required name="peitoral" value="<?=$row['peitoral'] ?>" class="form-control medida" id="peitoral">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Supra-ilíaca</label>
						<input type="text" required name="suprailiaca" value="<?=$row['supraIliaca'] ?>" class="form-control medida" id="supariliaca">
					</div>
					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Abdominal</label>
						<input type="text" required name="abdominal" value="<?=$row['abdominal'] ?>" class="form-control medida" id="abdominal">
					</div>
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Toráx</label>
						<input type="text" required name="torax" value="<?=$row['torax'] ?>" class="form-control medida" id="torax">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Antebraço esquerdo</label>
						<input type="text" required name="antesq" value="<?=$row['antebracoE'] ?>" class="form-control medida" id="antesq">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Antebraço direito</label>
						<input type="text" required name="antdir" value="<?=$row['antebracoD'] ?>" class="form-control medida" id="antdir">
					</div>
					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Abdominal (perimetro)</label>
						<input type="text" required name="abdominalper" value="<?=$row['abdominalPer'] ?>" class="form-control medida" id="abdominalper">
					</div>

				</div>
				
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Braço relaxado direito</label>
						<input type="text" required name="bracoreldir" value="<?=$row['bracoRD'] ?>" class="form-control medida" id="bracoreldir">
					</div>
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Braço relaxado esquerdo</label>
						<input type="text" required name="bracorelesq" value="<?=$row['bracoRE'] ?>" class="form-control medida" id="bracorelesq">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Braço contraído direito</label>
						<input type="text" required name="bracocondir" value="<?=$row['bracoCD'] ?>" class="form-control medida" id="bracocondir">
					</div>
					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Braço contraído esquerdo</label>
						<input type="text" required name="bracoconesq" value="<?=$row['bracoCE'] ?>" class="form-control medida" id="bracoconesq">
					</div>
					
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Coxa proximal</label>
						<input type="text" required name="coxaprox" value="<?=$row['coxaProximal'] ?>" class="form-control medida" id="coxaprox">
					</div>
					<div class="form-group col-md-3">
						<label for="biceps"><red>*</red>Coxa medial</label>
						<input type="text" required name="coxamed" value="<?=$row['coxaMedial'] ?>" class="form-control medida" id="coxamed">
					</div>
					<div class="form-group col-md-3">
						<label for="cintura"><red>*</red>Panturrilha</label>
						<input type="text" required name="panturrilha" value="<?=$row['panturrilha'] ?>" class="form-control medida" id="panturrilha">
					</div>
					
				</div>
				
				<div class="form-row">

					<div class="form-group col-md-3">
						<label for="triceps"><red>*</red>Gordura ideal</label>
						<input type="text" required name="gorideal" value="<?=$row['ideal'] ?>" class="form-control medida" id="gorideal">
					</div>
					<div class="form-group col-md-3">
						<label for="pressao"><red>*</red>Meta esperada pelo aluno</label>
						<input type="text" required name="meta" value="<?=$row['meta'] ?>" class="form-control medida" id="meta">
					</div>
					
				</div>

				<p>Campos com <red>*</red> são obrigatórios</p>
				<a class="btn btn-primary" href="aval_fisica">Voltar</a>
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
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				var $CampoValor = $( ".medida" );
				$CampoValor.mask( '000.00', {
					reverse: true
				} );
				var $estatura = $( "#estatura" );
				$estatura.mask( '000', {
					reverse: true
				} );
				
				$( 'input, :input' ).attr( 'autocomplete', 'off' );
			} );
		} );
	</script>
	
	
</body>
</html>