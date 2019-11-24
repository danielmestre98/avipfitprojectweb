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
				$( "#ger_agenda" ).addClass( "bg-dark active" )
			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Agenda</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Agenda de eventos</h1>
			<br>
			<h5>Registre eventos ou pesquise por eventos cadastrados para atualizar informações.</h5>
			<div id="botao_novo" align="right">
				<a href="novo_evento" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Evento</th>
						<th class='col'>Dia da semana</th>
						<th class='col'>Horário</th>
						<th class='col'>Filial</th>
						<th class="col">Colaborador(a)</th>
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
			$.fn.dataTable.ext.errMode = 'none';
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
				"sAjaxSource": "../lib/consulta_agenda.php",
				"columns": [ {
					data: 'evento'
				}, {
					data: 'dia'
				}, {
					data: 'horario',
					render: function (data, type, row){
						return row.horario+' - '+row.horafim
					}
				}, {
					data: 'cidade',
					render: function ( data, type, row ) {
						return row.rua + ', ' + row.numero + ', ' + row.bairro + ', ' + row.cidade + ', ' + row.estado;
					}
				}, {
					data: 'nome',
					render: function ( data, type, row ) {
						return data;
					}
				}, {
					data: null,
					render: function ( data, type, row ) {
						return '<a title="Editar" href="editar_evento.php?dia=' + data.dia + '&horario='+ data.horario +'&filial='+row.filial+'"><i class="fas fa-edit"></i></a>   <a title="Excluir" onclick ="confirma(\'' + row.id + '\',\'' + row.evento + '\',\'' + row.horario + '\',\'' + row.dia + '\')" href="#"><i class="far fa-trash-alt"></i></a>'



					}
				} ],
				columnDefs: [ {
						"width": '13%',
						"targets": 0
					}, {
						"width": '12%',
						"targets": 1
					}, {
						"width": '10%',
						"targets": 2
					}, {
						"width": '45%',
						"targets": 3
					}, {
						"targets": 5,
						"orderable": false
					}



				]



			} );


		} );
	</script>

	<script>
		function confirma( dia, tipo, hora, semana ) {
			if ( window.confirm( "Deseja deletar o evento "+tipo+" para "+semana+"s às "+hora+"h? \nEsta ação impossibilitará o agendamento dos alunos para este dia da semana e horário." ) ) {
				window.location = "../lib/deletar_evento.php?dia=" + dia
			} else {
				return false

			}
		}
	</script>
</body>
</html>