<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#ajuda" ).addClass( "active" );
				$( "#ajuda_drop" ).slideDown( 200 );
				$( "#tickets" ).addClass( "bg-dark active" )
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Suporte</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Suporte</h1>
			<br>
			<h5>Gerencie os tickets dos usuários.</h5>
			<br>
			<table data-order='[[ 0, "desc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>ID</th>
						<th class='col'>Descrição</th>
						<th class='col'>Classificação</th>
						<th class='col'>Status</th>
						<th class='col'>Prioridade</th>
						<th class='col'>Ações</th>

					</tr>
				</thead>
				<tbody>
					<!--<td><a href="view_ticket" title="Visualizar"><i class="far fa-eye"></i></a>-->
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
				"sAjaxSource": "../lib/consulta_ticketSupp.php",

				"columns": [ {
					data: 'id',
				}, {
					data: 'titulo'
				}, {
					data: 'classificacao'
				}, {
					data: 'status'
				}, {
					data: 'prioridade'
				}, {
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Visualizar" href="view_ticket?id=' + row.id + '"><i class="far fa-eye"></i>'
					}
				} ],

				"autoWidth": false,
				"bProcessing": true,
				columnDefs: [ {
						"width": '10%',
						"targets": 0
					}, {
						"width": '70%',
						"targets": 1
					}, {
						"width": '20%',
						"targets": 2
					}, {
						"orderable": false,
						"targets": 5
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