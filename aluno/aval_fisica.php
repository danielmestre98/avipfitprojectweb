<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#aval_fisica" ).addClass( "active" );

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
			<h1 align="center">Avaliações físicas</h1>
			<div class="form-row">
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Mês de referência</label>
					<select class="form-control" name="" id="">
						<option value="">Janeiro</option>
						<option value="">Fevereiro</option>
						<option value="">Março</option>
						<option value="">Abril</option>
						<option value="">Maio</option>
						<option value="">Junho</option>
						<option value="">Julho</option>
						<option value="">Agosto</option>
						<option value="">Setembro</option>
						<option value="">Outubro</option>
						<option value="">Novembro</option>
						<option value="">Dezembro</option>
					</select>
				</div>
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Ano de referência</label>
					<select class="form-control" name="" id="">
						<option value="">2017</option>
						<option value="">2018</option>
						<option selected value="">2019</option>
					</select>
				</div>
				
			</div>

			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Avaliação física</th>
						<th class='col'>Detalhes</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>09/06/2019</td>
						<td>
							<a href="ver_aval" title="Ver"><i class="far fa-eye"></i></a>
						</td>
					</tr>
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

				"columns": [ {
					data: 'evento'
				}, {
					data: 'dia'
				} ],
				columnDefs: [ {
						"searchable": false,
						"targets": 1
					}, {
						"orderable": false,
						"targets": 1
					}, {
						"width": '70%',
						"targets": 0
					}, {
						"width": '2%',
						"targets": 1
					}


				],
				initComplete: function () {
					$( '.dataTables_filter input[type="search"]' ).css( {
						'width': '630px',
						'display': 'inline-block'
					} );
				}



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