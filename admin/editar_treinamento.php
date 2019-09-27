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
			<h1 align="">
				Edição de treinamento
			</h1>
			<br>
			<h5>Preencha os campos obrigatórios e clique em Salvar para atualizar o cadastro de um treinamento.</h5>
			<br>
		




			<?php
			include( '../conectar.php' );
			$treinamento = $_GET[ 'nome' ];
			$resulted = mysqli_query( $conn, "SELECT NomeTreinamento FROM treinamento WHERE NomeTreinamento = '$treinamento'" )or die( mysqli_error( $conn ) );
			if ( mysqli_num_rows( $resulted ) === 1 ) {
				$row = mysqli_fetch_assoc( $resulted );
				$nome = $row[ 'NomeTreinamento' ];
			}


			?>

			<br>
			<form id="edit_treinamento" method="post" enctype="multipart/form-data" action="../lib/editar_treinamento.php?nome=<?php echo $_GET['nome']?>">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="nome">
							<red>*</red> Nome do treinamento</label>
						<input required type="text" maxlength="50" value="<?php echo $nome?>" id="nome" name="nome" class="form-control">
						<input type="text" hidden="true" value="<?=$nome?>" id="nomeOld" name="nomeOld">
					</div>
				</div>
				Selecione os exercícios

				<select multiple="multiple" size="10" name="exercicios[]" id="exercicios">

					<?php
					require( '../conectar.php' );
					$sql = "Select NomeExercicio FROM exercicio e WHERE NomeExercicio NOT IN (SELECT Exercicio FROM contem WHERE NomeTreinamento = '$nome')";
					$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );

					mysqli_close( $conn );
					include( '../conectar.php' );
					$sql2 = "SELECT Exercicio FROM contem WHERE NomeTreinamento = '$nome'";
					$result2 = mysqli_query( $conn, $sql2 )or die( mysqli_error( $conn ) );
					mysqli_close( $conn );
					$compara1 = explode(',', $result);
					$compara2 = explode(',', $result2);
					$final = array_diff($compara2, $compara1);
					while ($row = mysqli_fetch_array($result)){
						echo '<option>' . $row['NomeExercicio'] . '</option>';
					
					}
					while ($row2 = mysqli_fetch_array($result2)){
						echo '<option selected>' . $row2['Exercicio'] . '</option>';
					}

					?>

				</select>
				<br>
				<a href="consulta_treinamento" class="btn btn-primary">Voltar</a>
				<button class="btn btn-primary" style="float: right" type="submit">Salvar</button>
			</form>
		</div>

	</main>
	<!-- page-content" -->

	<script src="../js/moment.js"></script>
	<script src="../js/datatables.min.js"></script>
	<script src="../js/datetime.js"></script>
	<script src="../js/responsive.bootstrap4.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
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

				infoTextFiltered: '<span class="badge badge-warning">Filtered</span> {0} from {1}',

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
	<script src="../js/valida_form.js"></script>

</body>
</html>