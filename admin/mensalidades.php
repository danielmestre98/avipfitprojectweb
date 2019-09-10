<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<script>
		jQuery( function ( $ ) {
			$( document ).ready( function () {
				$( "#mensalidades" ).addClass( "active" );

			} );
		} );
	</script>
	<meta charset="utf-8">
	<title>AVIPfit - Mensalidades</title>
	<link rel="stylesheet" href="../css/datatables.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
</head>

<?php
include( '../conectar.php' );
$sql = "SELECT EXTRACT(YEAR FROM cadastro) AS ano FROM pessoa WHERE tipoPessoa = '2' GROUP BY cadastro";
$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
mysqli_close( $conn );
$year = date( "Y" );
?>


<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1>Mensalidades</h1>
			<div class="form-row">
				<div class="form-group col-md-3" style="float: right;">
					<label for="mes">Mês de referência</label>
					<span id="mes"></span>
				</div>
				<div class="form-group col-md-4">
					<label for="status">Status do pagamento</label>
					<span id="status"></span>
				</div>
			</div>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Nome</th>
						<th class='col'>Vencimento</th>
						<th class="col">Competência</th>
						<th class='col'>Status</th>
						<th class='col'>Ações</th>
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
							"sAjaxSource": "../lib/consulta_mensalidade.php",
							"columns": [ {
									data: 'nome'
								}, {
									data: 'DataVencimento'
								}, {
									data: 'competencia'
								}, {
									data: 'status'
								}, {
									data: null,
									render: function ( data, type, row ) {
										return '<a title="Editar" href="gerenciar_mensalidade.php?cpf=' + row.cpf + '&comp='+ row.competencia +'"><i class="fas fa-edit"></i></a>'



									}
								} ],
								columnDefs: [ {
										"width": '63%',
										"targets": 0
									}, {
										"width": '16%',
										"targets": 2
									}, {
										"width": '1%',
										"targets": 1
									}


								],
								initComplete: function () {
									var column = this.api().column( 2 );
									var select = $( '<select class= "form-control md-4"><option value="">Selecione o mês referência</option></select>' )
										.appendTo( $( '#mes' ).empty().text( '' ) )
										.on( 'change', function () {
											var val = $.fn.dataTable.util.escapeRegex(
												$( this ).val()
											);
											column
												.search( val ? '^' + val + '$' : '', true, false )
												.draw();

										} );
									column.data().unique().sort().each( function ( d, j ) {
										select.append( '<option value="' + d + '">' + d + '</option>' );
									} );

									var column2 = this.api().column( 3 );
									var select2 = $( '<select class= "form-control"><option value="">Mostrar todos</option></select>' )
										.appendTo( $( '#status' ).empty().text( '' ) )
										.on( 'change', function () {
											var val = $.fn.dataTable.util.escapeRegex(
												$( this ).val()
											);
											column2
												.search( val ? '^' + val + '$' : '', true, false )
												.draw();

										} );
									column2.data().unique().sort().each( function ( d, j ) {
										select2.append( '<option value="' + d + '">' + d + '</option>' );
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