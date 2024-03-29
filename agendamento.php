<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit - Agendamento</title>
	<link rel="stylesheet" href="css/reddot.css">
	<link rel="stylesheet" href="css/gijgo.min.css">
		<link rel="stylesheet" href="../css/select2.css">
	
	<link rel="stylesheet" href="../css/select2-bootstrap4.min.css">
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Agendamento de aula experimental</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para agendar sua aula experimental. As datas em verde estão disponíveis!</h5>
			<br>
			<form id="agendamento_exp" action="lib/salvar_ag_exp.php" enctype="multipart/form-data" method="post">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="descricao">
							<red>*</red>Filial</label>
						<select required class="form-control" name="filial" id="filial">
							<option value="">Selecione a opção desejada</option>
							<?php
							require( 'conectar.php' );
							$sql = "SELECT IdFilial, cidade, bairro, estado, rua, numero FROM filial";
							$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
							while ( $row = mysqli_fetch_array( $result ) ) {
								echo '<option value="' . $row[ 'IdFilial' ] . '">' . $row[ 'rua' ] . ', ' . $row[ 'numero' ] . ', ' . $row[ 'bairro' ] . ', ' . $row[ 'cidade' ] . ', ' . $row[ 'estado' ] . '</option>';
							}
							mysqli_close( $conn );
							?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="nomeExercicio">
							<red>*</red>Data do agendamento</label>
						<input style="cursor:pointer; background-color: #FFFFFF" placeholder="dd/mm/aaaa" required readonly autocomplete="off" name="dia" id="picker"/>
					</div>
					<div class="form-group col-md-3">
						<label for="descricao">
							<red>*</red>Horário</label>
						<select name="hora" required class="form-control" id="horario">
							<option value="">Selecione a opção desejada</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="descricao">Treinamento</label>
						<select class="form-control" name="treinamento" id="">
							<option value="">Selecione a opção desejada</option>
							<?php
							require( 'conectar.php' );
							$sql = "Select NomeTreinamento FROM treinamento WHERE inativo != '1'";
							$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
							while ( $row = mysqli_fetch_array( $result ) ) {
								echo '<option>' . $row[ 'NomeTreinamento' ] . '</option>';
							}
							mysqli_close( $conn );
							?>
						</select>
					</div>

				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label for="descricao">
							<red>*</red>Nome do aluno(a)</label>
						<input type="text" required placeholder="Nome" name="nome" class="form-control" id="descricao">
					</div>
					<div class="form-group col-md-4">
						<label for="email">
							<red>*</red>E-mail para contato</label>
						<input type="text" placeholder="exemplo@exemplo.com" required name="email" class="form-control" id="email">
					</div>
					<div class="form-group col-md-3">
						<label for="numero">
							<red>*</red>Telefone para contato</label>
						<input type="text" placeholder="(19) 999999999" required name="numero" class="form-control" id="numero">
					</div>


				</div>
				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>


				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			</form>







		</div>
	</main>
	<!-- page-content" -->
	</div>
	<script src="js/jquery.mask.js"></script>
	<script src="../js/select2.full.min.js"></script>
	
		<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$('select').select2({
					theme: 'bootstrap4',
					placeholder: 'Selecione a opção desejada',
					dropdownCssClass: "myFont"
				});
				
			});
		});
	</script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/additional-methods.min.js"></script>
	<script src="js/valida_form.js"></script>
	<script src="js/gijgo.min.js"></script>
	<script src="js/messages/messages.pt-br.min.js"></script>
	<script>
		$( '#filial' ).on( 'change', function () {
			$.ajax( {
				type: "POST",
				url: "pegar.php",
				data: $( 'form' ).serialize(),
				context: this,
				success: function ( data ) {
					$("#picker").datepicker("destroy");
					var today;
					var resultado = JSON.parse(data);
					today = new Date( new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + 1 );
					$( '#picker' ).datepicker( {
						disableDaysOfWeek: resultado,
						uiLibrary: 'bootstrap4',
						format: 'dd/mm/yyyy',
						minDate: today,
						close: function (e) {
             				$("#agendamento_exp").validate().element("#picker");
         				},
						locale: 'pt-br',
						change: function ( e ) {
							var $datepicker = $( '#picker' ).datepicker();
							$.getJSON( 'lib/consulta_ag_exp.php?dia=' + $datepicker.value()+'&filial=' + $('#filial').val(), function ( dados ) {
								if ( dados.length > 0 ) {
									$( '#horario' ).empty();
									var option = '<option value="">Selecione a opção desejada</option>';
									$.each( dados, function ( i, obj ) {
										option += '<option value="' + obj + '">' + obj + '</option>';
									} )
									$( '#horario' ).html( option ).show();
								}
							} )
						}
					} );
				}
			} );
		} );
	</script>

	<script type="text/javascript">
		var today;
		var $dias = [0,1,2,3,4,5,6];
		today = new Date( new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + 1 );
		$( '#picker' ).datepicker( {
			disableDaysOfWeek: $dias,
			uiLibrary: 'bootstrap4',
			format: 'dd/mm/yyyy',
			minDate: today,
			close: function (e) {
             				$("#agendamento_exp").validate().element("#picker");
         	},
			locale: 'pt-br',
			change: function ( e ) {
				var $datepicker = $( '#picker' ).datepicker();
				$.getJSON( 'lib/consulta_ag_exp.php?dia=' + $datepicker.value(), function ( dados ) {
					if ( dados.length > 0 ) {
						$( '#horario' ).empty();
						var option = '<option value="">Selecione a opção desejada</option>';
						$.each( dados, function ( i, obj ) {
							option += '<option value="' + obj + '">' + obj + '</option>';
						} )
						$( '#horario' ).html( option ).show();
					}
				} )
			}
		} );
	</script>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				var $CampoTel = $( "#numero" );
				$CampoTel.mask( '(00) 000000000', {
					reverse: false
				} );
				$( 'input, :input' ).attr( 'autocomplete', 'off' );
			} );
		} );
	</script>
</body>
</html>