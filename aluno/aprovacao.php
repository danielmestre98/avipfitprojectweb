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
			$( "#agendamento" ).addClass( "active" );
			$( "#ag_drop" ).slideDown( 200 );
			$( "#ger_agendamentos" ).addClass( "bg-dark active" )
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container">
			<h1 align="center">Agendamento de avaliação física</h1>
			<br>
			<form id="exercicio_cadastro" action="agendamentos" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-9">
						<label for="nomeExercicio">
							Nome</label>
					

						<input type="text" name="nomeExerciciou" readonly value="Daniel Mestre Loureiro" required class="form-control" id="nomeExercicio" placeholder="Nome">
					</div>
					
					<div class="form-group col-md-2">
						<label for="descricao">
							Data</label>
					

						<input type="text" required readonly value="19/06/2019" name="descricao" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-1">
						<label for="descricao">
							Hora</label>
					

						<input type="text" required readonly value="17:00" name="descricao" class="form-control" id="descricao">
					</div>
				</div>
				
				<div class="form-row">
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cidade"><red>*</red>Aprovação</label>
						<select required disabled class="form-control" name="" id="aprovacao">
							<option value=""></option>
							<option value="1">Aprovado</option>
							<option value="2">Cancelado</option>
						</select>
					</div>
					<div id="cancelar" class="form-group col-md-6">
						<label for="nomeExercicio">
							<red>*</red>Descrição do cancelamento</label>
					

						<textarea type="text" name="nomeExercicio" rows="10" value="" required class="form-control" id=""></textarea>
					</div>
				</div>
				<p>Campos com <red>*</red> são obrigatórios</p>
				


				<a class="btn btn-primary" href="agendamento">Voltar</a>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#cancelar').hide();
        $('#aprovacao').change(function() {
             if ($('#aprovacao').val() == 1) {
                $('#cancelar').hide();   
            }  else {
                $('#cancelar').show();
            }
        });
    });
</script> 
	<script src="../js/jquery.mask.js"></script>

	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>