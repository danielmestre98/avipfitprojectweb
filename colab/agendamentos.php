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
	<title>AVIPfit - Agendamentos</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Gerenciar agendamentos</h1>
			<br>
			<h5>Aprove eventos ou pesquise por eventos para atualizar informações.</h5>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Aluno(a)</th>
						<th class='col'>Data e horário</th>
						<th class="col">Filial</th>
						<th class="col">Agendamento</th>
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
								"zeroRecords": "Nenhum registros encontrado",
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
							"sAjaxSource": "../lib/consulta_agendamento.php",
							"autoWidth": false,
							"columns": [ {
									data: 'nome'
								}, {
									data: null,
									render: function ( data, type, row ) {
										return row.data + ' '+ row.horario + ' - ' + row.horafim
									}
								},
									{
										data: 'filial',
										render: function ( data, type, row ) {
											return row.rua + ', ' + row.numero + ', ' + row.bairro + ', ' + row.cidade + ', ' + row.estado;
										}
									},
									{
										data: 'tipo'
									},
									{
										data: 'status'
									},
									{
										data: null,
										render: function ( data, type, row ) {
											return '<a title="Visualizar" href="aprovacao.php?id=' + row.id + '&tipo=' + row.tipo + '"><i class="far fa-eye"></i>'
										}
									} ],
								"bProcessing": true,
								columnDefs: [ {
										"width": '40%',
										"targets": 0
									}, {
										"width": '10%',
										"targets": 1
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