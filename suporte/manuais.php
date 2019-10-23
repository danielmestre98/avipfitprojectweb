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
			$( "#manuais" ).addClass( "bg-dark active" )
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Manuais</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Manuais</h1>
			<br>
			<h5>Adicione ou exclua manuais de usuário.</h5>
				<div id="botao_novo" align="right">
				<a href="novo_manual" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>

			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Nome</th>
						<th class='col'>Ação</th>
					</tr>
				</thead>
				<tbody>
				</tbody>

			</table>

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
					"infoFiltered": "(filtrado de _MAX_ registros totais)",
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
				"sAjaxSource": "../lib/consulta_manual.php",

				"columns": [ {
					data: 'nome',
				}, {
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Excluir" onclick ="confirma(\'' + row.id + '\',\'' + data.nome + '\')" href="#"><i class="far fa-trash-alt"></i></a>'
					}
				} ],

				"autoWidth": false,
				"bProcessing": true
				
					


			} );


		} );
	</script>

	<script>
		function confirma( nome, cpf ) {
			if ( window.confirm( " Tem certeza que deseja deletar o manual " + cpf + "? " ) ) {
				window.location = "../lib/deletar_manual.php?id=" + nome
			} else {
				return false

			}
		}
	</script>
</body>
</html>