<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#agendamento" ).addClass( "active" );
			$( "#ag_drop" ).slideDown( 200 );
			$( "#ger_agendamentos" ).addClass( "bg-dark active" )
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
			<br>
			<h1>Agendamentos</h1>
			<br>
			<h5>Registre o agendamento de uma avaliação física e verifique os detalhes dos agendamentos realizados.</h5>
			<br>
			<div id="botao_novo" align="right">
				<a href="novo_agen" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Data do agendamento</th>
						<th class="col">Horário</th>
						<th class='col'>Status</th>
						<th class='col'>Detalhes</th>
				
					</tr>
				</thead>
				

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
				"sAjaxSource": "../lib/consulta_agendamento_aluno.php",
				"autoWidth": false,
				"bProcessing": true,
				"columns": [{
					data: 'dia'
				}, {
					data: null,
					render: function ( data, type, row ) {
							return row.horario +' - '+ row.horafim
					}
				},{
					data: 'status'
				},
				{
					data: null,
					render: function ( data, type, row ) {
							return '<a title="Visualizar" href="aprovacao.php?id=' + row.id + '&tipo=' + row.tipo + '"><i class="far fa-eye"></i>'
					}
				}],
				columnDefs: [{
						"width": '30%',
						"targets": 0
					}, {
						"width": '30%',
						"targets": 1
					}, {
						"width": '30%',
						"targets": 2
					},{
						"orderable": false,
						"targets": 3
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