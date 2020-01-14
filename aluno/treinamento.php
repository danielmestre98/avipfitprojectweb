<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#treinamento" ).addClass( "active" );
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Cadastro</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Treinamento</h1>
			<br>
			<?php
			session_start();
			$cpf = $_SESSION[ 'cpf' ];
			$sql = "SELECT Treinamento FROM realiza WHERE cpf = '$cpf'";
			$result = $conn->query( $sql );
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$treinamento = $row['Treinamento'];
			?>
			<h4><?=$treinamento?></h4>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Exercício</th>
						<th class='col'>Vídeo</th>

					</tr>
				</thead>

			</table>
			<br>

		</div>










		</div>
	</main>
	<!-- page-content" -->

	<script src="../js/moment.js"></script>
	<script src="../js/datatables.min.js"></script>
	<script src="../js/datetime.js"></script>
	<script src="../js/responsive.bootstrap4.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<script>
		$( document ).ready( function () {
			if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
				$( "#divt" ).removeClass( "container-fluid p-5" );
			}

			$( '#tabela' ).DataTable( {

				"bLengthChange": false,
				"language": {
					"zeroRecords": "Nenhum registro encontrado",
					"info": "Mostrando página _PAGE_ de _PAGES_",
					"infoEmpty": "Nenhum registro disponível",
					"infoFiltered": "(filtrado de _MAX_ registro totais)",
					"search": "Pesquisar",
					"first": "Primeiro",
					"pagingType": "simple",
					"processing": "Carregando...",
					"paginate": {
						"last": "Último",
						"next": "Próxima",
						"previous": "Anterior"
					},
					"emptyTable": "Nenhum registro"

				},
				"responsive": true,
				"sAjaxSource": "../lib/consulta_a_treinamento.php",
				"autoWidth": false,
				"bProcessing": true,
				"columns": [ {
					data: 'Exercicio'
				}, {
					data: null,
					render: function ( data, type, row ) {
						if ( row.url.length > 2 ) {
							return '<a title="Visualizar vídeo" target="_blank" href="' + row.url + '"><i class="far fa-eye"></i></a>'
						} else {
							return '<i title="Não há link de vídeo disponível" class="far fa-eye"></i>'
						}
					}
				} ],
				columnDefs: [ {
						"orderable": false,
						"targets": 1
					}, {
						"width": '95%',
						"targets": 0
					}, {
						"width": '5%',
						"targets": 1
					}, {
						"orderable": false,
						"targets": 1
					}



				]



			} );


		} );
	</script>

	<script>
		function confirma( dia, horario, filial ) {
			if ( window.confirm( " Tem certeza que deseja excluir esse evento?" ) ) {
				window.location = "../lib/deletar_evento.php?dia=" + dia + "&horario=" + horario + "&filial=" + filial
			} else {
				return false

			}
		}
	</script>
</body>
</html>