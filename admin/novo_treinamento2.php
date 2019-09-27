<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#cadastro" ).addClass( "active" );
				$( "#cad_drop" ).slideDown( 200 );
				$( "#cad_treinamento" ).addClass( "bg-dark active" )
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Cadastro</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="../css/reddot.css">
	<link rel="stylesheet" href="../css/bootstrap-duallistbox.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>
				Cadastro de treinamento
			</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para cadastrar um treinamento.</h5>
		<br>
			<form id="treinamento" method="post" enctype="multipart/form-data" action="../lib/novo_treinamento.php">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nome"><red>*</red>Nome do treinamento</label>
						<input required placeholder="Nome" maxlength="50" type="text" id="nome" name="nome" class="form-control">
					</div>
				</div>
				Selecione os exercícios
				
				<select multiple="multiple" size="10" name="exercicios[]" id="exercicios">

											<?php
						require( '../conectar.php' );
						$sql = "Select NomeExercicio FROM exercicio";
						$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
						while ( $row = mysqli_fetch_array( $result ) ) {
							echo '<option>' . $row[ 'NomeExercicio' ] . '</option>';
						}
						mysqli_close( $conn );

						?>

				</select>
				<label style="margin-left: 4px" for="">Campos com <red>*</red> são obrigatórios.</label>
							<br>
			<a href="consulta_treinamento" class="btn btn-primary">Voltar</a>
			<button class="btn btn-primary" style="float: right" type="submit">Salvar</button>
			</form>


		</div>










		</div>
	</main>
	<!-- page-content" -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/datetime.js"></script>
	<script src="../js/responsive.bootstrap4.min.js"></script>
	

	
	<script src="../js/jquery.bootstrap-duallistbox.js"></script>
	
	<script>
		$( document ).ready( function () {
			$( '#exercicios' ).bootstrapDualListbox( {



				// default text

				filterTextClear: 'mostrar tudo',

				filterPlaceHolder: 'Pesquisar',

				moveSelectedLabel: 'Mover selecionados',

				moveAllLabel: 'Mover todos',

				removeSelectedLabel: 'Remover selecionados',

				removeAllLabel: 'Remover todos',

				// true/false (forced true on androids, see the comment later)

				moveOnSelect: true,


				// 'all' / 'moved' / false                                          

				preserveSelectionOnMove: false,



				// 'string', false                                    

				selectedListLabel: false,

				// 'string', false
				nonSelectedListLabel: false,

				// 'string_of_postfix' / false                                                     

				helperSelectNamePostfix: '_helper',

				// minimal height in pixels

				selectorMinimalHeight: 100,

				// whether to show filter inputs
				showFilterInputs: true,

				// string, filter the non selected options                                                

				nonSelectedFilter: '',

				// string, filter the selected options                                             

				selectedFilter: '',

				// text when all options are visible / false for no info text                     

				infoText: 'Total {0}',

				// when not all of the options are visible due to the filter                                        

				infoTextFiltered: '<span class="badge badge-warning">Filtrado</span> {0} de {1}',

				// when there are no options present in the list

				infoTextEmpty: 'Lista vazia',

				// sort by input order

				sortByInputOrder: false,

				// filter by selector's values, boolean

				filterOnValues: false,

				// boolean, allows user to unbind default event behaviour and run their own instead                                                  

				eventMoveOverride: false,

				// boolean, allows user to unbind default event behaviour and run their own instead                                               
				eventMoveAllOverride: false,

				// boolean, allows user to unbind default event behaviour and run their own instead

				eventRemoveOverride: false,

				// boolean, allows user to unbind default event behaviour and run their own instead                                             

				eventRemoveAllOverride: false,

				// sets the button style class for all the buttons

				btnClass: 'btn-outline-secondary',

				// string, sets the text for the "Move" button                                           
				btnMoveText: '&gt;',

				// string, sets the text for the "Remove" button                                                       

				btnRemoveText: '&lt;',

				// string, sets the text for the "Move All" button

				btnMoveAllText: '&gt;&gt;',
				// string, sets the text for the "Remove All" button
				btnRemoveAllText: '&lt;&lt;'

			} );
		} );
	</script>
		<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script src="../js/valida_form.js"></script>
</body>
</html>