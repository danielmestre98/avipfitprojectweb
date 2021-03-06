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
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Treinamentos</h1>
			<br>
			<h5>Registre treinamentos ou pesquise por treinamentos cadastrados para atualizar informações.</h5>
			<br>
			<div id="botao_novo" align="right">
				<a href="novo_treinamento2" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Treinamento</th>
						<th class='col'>Ações</th>
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

				"autoWidth": false,
				"bProcessing": true,
				"sAjaxSource": "../lib/consulta_treinamento.php",
				"columns": [ {
					data: 'NomeTreinamento'
				}, {
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Editar" href="editar_treinamento.php?nome=' + data.NomeTreinamento + '&id='+row.id+'"><i class="fas fa-edit"></i></a>  <a title="Excluir" onclick ="confirma(\'' + data.NomeTreinamento + '\',\'' + row.id + '\')" href="#"><i class="far fa-trash-alt"></i></a>'



					}
				} ],
				columnDefs: [ {
						"searchable": false,
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
		function confirma( nome, cpf ) {
			if ( window.confirm( "Deseja deletar o treinamento " + nome + "? \nEsta ação desassociará este treinamento dos cadastros de alunos." ) ) {
				window.location = "../lib/deletar_treinamento.php?nome=" + cpf + "&trei= " + nome
			} else {
				return false

			}
		}
	</script>
</body>
</html>