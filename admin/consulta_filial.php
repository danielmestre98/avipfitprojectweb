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
				$( "#cad_filial" ).addClass( "bg-dark active" )
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Cadastro</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="../css/search.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Filiais</h1>
			<br>
			<h5>Registre filiais ou pesquise por filiais cadastradas para atualizar informações.</h5>
			<br>
			<div id="botao_novo" align="right">
				<a href="novo_filial" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Filial</th>
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
				"sAjaxSource": "../lib/consulta_filial.php",
				"columns": [ {
					data: 'cidade',
					render: function ( data, type, row ) {
						return row.rua + ', ' + row.numero + ', ' + row.bairro + ', ' + row.cidade + ', ' + row.estado;
					}
				}, {
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Editar" href="editar_filial.php?id=' + data.IdFilial + '"><i class="fas fa-edit"></i></a>  <a title="Excluir" onclick ="confirma(\'' + data.cidade + '\',\'' + data.IdFilial + '\',\'' + row.rua + '\',\'' + row.estado + '\',\'' + row.numero + '\',\'' + row.bairro + '\')" href="#"><i class="far fa-trash-alt"></i></a>'



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

		function confirma( nome, cpf , rua, estado, numero, bairro) {
			if ( window.confirm( "Deseja deletar a filial " + rua + ", "+ numero + ", "+ bairro +", "+ nome +", "+ estado +"? \nEsta ação desassociará esta filial dos cadastros de alunos." ) ) {
				window.location = "../lib/deletar_filial.php?id=" + cpf
			} else {
				return false

			}
		}
	</script>
</body>
</html>