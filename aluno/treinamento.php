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
			<h1 align="center">Treinamento</h1>
			<br>
			<h4>Perda de peso</h4>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Exercício</th>
						<th class='col'>Vídeo</th>
				
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Abdominal</td>
						<td><a target="_blank" href="https://www.youtube.com" title="Visualizar"><i class="far fa-eye"></i></a></td>
					</tr>
				</tbody>

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

				"autoWidth": false,
				"bProcessing": true,
				columnDefs: [ {
						"orderable": false,
						"targets": 1
					}, {
						"width": '70%',
						"targets": 0
					}, {
						"width": '30%',
						"targets": 1
					}, {
						"width": '20%',
						"targets": 2
					},{
						"orderable": false,
						"targets": 1
					},{
						"orderable": false,
						"targets": 2
					}



				]



			} );

			
		} );
	</script>

	<script>
		function confirma(dia, horario, filial){
			if ( window.confirm( " Tem certeza que deseja excluir esse evento?" ) ) {
					window.location="../lib/deletar_evento.php?dia="+dia+"&horario="+horario+"&filial="+filial
			} else {
				return false
				
			}
		}
	</script>
</body>
</html>