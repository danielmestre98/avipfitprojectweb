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
			<h1>Avaliações físicas</h1>
			<br>
			<h5>Selecione mês/ano de referência para registrar uma avaliação para um aluno, analisar os resultados das avaliações físicas realizadas e verificar o comparativo de medidas por meio de análise gráfica.</h5>
			<br>
			<div class="form-row">
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Mês e ano de referência</label>
					<span id="mes"></span>
				</div>
				
			</div>
			<div id="botao_novo" align="right">
				<a href="novo_aval" class="btn btn-primary">Novo <i class="fas fa-plus"></i></a>

			</div>
			<br>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Nome</th>
						<th class="col">Data</th>
						<th class='col'>Ações</th>
					</tr>
				</thead>
				<tbody>
<!--					<tr>
						<td>Daniel Mestre Loureiro</td>
						<td>
							<a href="ver_aval" title="Ver"><i class="far fa-eye"></i></a>
							<a href="selecionar_edit" title="Editar"><i class="fas fa-edit"></i></a>
						</td>
					</tr>-->
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
				"sAjaxSource": "../lib/consulta_aval.php",
				"autoWidth": false,
				"bProcessing": true,
				
				"columns": [ {
					data: 'nome'
				}, {
					data: 'data'
				},{
						data: null,
						render: function ( data, type, row ) {
							return '<a title="Editar" href="edit_aval?id=' + data.id + '"><i class="fas fa-edit"></i></a>  <a href="ver_aval?id='+data.id+'" title="Ver"><i class="far fa-eye"></i></a>'
						}
				}],
				columnDefs: [ {
						"searchable": false,
						"targets": 2
					}, {
						"orderable": false,
						"targets": 2
					}, {
						"width": '70%',
						"targets": 0
					}, {
						"width": '2%',
						"targets": 2
					},
					{
						"width": '10%',
						"targets": 1
					}


				],
				initComplete: function () {
					var column = this.api().column( 1 );
					var select = $( '<select class= "form-control md-4"><option value="">Selecione a opção desejada</option></select>' )
						.appendTo( $( '#mes' ).empty().text( '' ) )
						.on( 'change', function () {
							column
								.search( this.value )
								.draw();

						} );
					column.data().unique().sort( function ( a, b ) {
						b = b.split( "/" );
						
						return new Date( a[ 2 ] )
					} ).each( function ( d, j ) {
						
						d = d.split( "/" );
						var c;
						c = d[1]+"/"+d[2];
						
						 if (!$("#mes option[value='" + c + "']").length) {
						select.append( '<option value="' + c + '">' + c + '</option>' );
						 }
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