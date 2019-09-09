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
	include ('../conectar.php');
	$sql = "SELECT EXTRACT(YEAR FROM cadastro) AS ano FROM pessoa WHERE tipoPessoa = '2' GROUP BY cadastro";
	$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
	mysqli_close( $conn );	
	$year = date("Y");
	?>
	
	
<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div id="divt" class="container-fluid p-5">
			<h1 align="center">Mensalidades</h1>
			<div class="form-row">
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Mês de referência</label>
					<select class="form-control" name="" id="">
						<option>Janeiro</option>
						<option>Fevereiro</option>
						<option>Março</option>
						<option>Abril</option>
						<option>Maio</option>
						<option>Junho</option>
						<option>Julho</option>
						<option>Agosto</option>
						<option>Setembro</option>
						<option>Outubro</option>
						<option>Novembro</option>
						<option>Dezembro</option>
					</select>
				</div>
				<div class="form-group col-md-2" style="float: right;">
					<label for="opcao">Ano de referência</label>
					<select class="form-control" name="" id="">
						<?php
						for ($ano = 2019; $ano <= $year; $ano++){
							echo '<option>'. $ano . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover " data-page-length='8' id="tabela">

				<thead>
					<tr>
						<th class='col'>Nome</th>
						<th class="col">Vencimento</th>
						<th class='col'>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Daniel Mestre Loureiro</td>
						<td>15/06/2019</td>
						<td>
							<select class="form-control" name="" id="">
								<option value="">Pagamento efetuado</option>
								<option value="">Em débito</option>
							</select>
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
				"sAjaxSource": "../lib/consulta_mensalidade.php",
				"columns": [ {
					data: 'evento'
				}, {
					data: 'dia'
				}, {data:'pagamento'} ],
				columnDefs: [ {
						"width": '70%',
						"targets": 0
					}, {
						"width": '16%',
						"targets": 2
					},
							 {
						"width": '1%',
						"targets": 1
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