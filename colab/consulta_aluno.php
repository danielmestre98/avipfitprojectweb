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
				$( "#cad_aluno" ).addClass( "bg-dark active" )
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
			<h1>Alunos</h1>
			<div id="botao_novo" align="right">
				<a href="novo_aluno" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Nome</th>
						<th class='col'>Ações</th>
						<th class="col">Ações</th>
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
			//$.fn.dataTable.ext.errMode = 'none';
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
				"sAjaxSource": "../lib/consulta_aluno.php",
				"columns": [ {
					data: 'nome'
				}, 
					{
					data: 'cidade'
				},		
				{
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Editar" href="editar_aluno.php?cpf=' + data.cpf + '"><i class="fas fa-edit"></i></a>  <a title="Excluir" onclick ="confirma(\'' + data.cpf + '\',\'' + data.nome + '\')" href="#"><i class="far fa-trash-alt"></i></a>'



					}
				},{
					data: 'segunda'
				},
							{
					data: 'terca'
				},
							{
					data: 'quarta'
				},
							{
					data: 'quinta'
				},{
					data: 'sexta'
				},
							{
					data: 'sabado'
				},{
					data: 'cpf'
				},{
					data: 'Treinamento'
				}
						   
						   ],
				columnDefs: [ {
						"searchable": false,
						"targets": 2
					}, {
						"orderable": false,
						"targets": 2
					}, {
						"width": '80%',
						"targets": 0
					}, {
						"width": '1%',
						"targets": 2
					},
							 {
						"visible": false,
						"targets": [1, 3,4,5,6,7,8,9,10]
					}



				]


			} );


		} );
	</script>

	<script>
		function confirma( cpf, nome ) {
			if ( window.confirm( " Tem certeza que deseja inativar o aluno " + nome + "? " ) ) {
				window.location = "../lib/deletar_aluno.php?cpf=" + cpf
			} else {
				return false

			}
		}
	</script>
</body>
</html>