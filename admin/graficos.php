<?php
include_once( 'nav.php' );
include( '../lib/ver_aval.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit</title>
	<link rel="stylesheet" href="../css/graficos.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		// Load the Visualization API and the corechart package.
		google.charts.load( 'current', {
			'packages': [ 'corechart' ]
		} );

		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback( drawChart );

		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawChart() {

			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn( 'string', 'Topping' );
			data.addColumn( 'number', 'Slices' );
			data.addRows( [
				<?php echo $grafico1m?>,
				<?php echo $grafico1g?>
			] );

			// Set chart options
			var options = {
				'title': '% de massa corporal',
				'width': '100%',
				'height': 300
			};

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart( document.getElementById( 'chart_div' ) );
			chart.draw( data, options );
		}
	</script>
	<script type="text/javascript">
		google.charts.load( "current", {
			packages: [ 'corechart' ]
		} );
		google.charts.setOnLoadCallback( drawChart );
		function drawChart() {
			var data = google.visualization.arrayToDataTable( [
				[ "Element", "Density", {
					role: "style"
				} ],
				[ "Copper", 8.94, "#b87333" ],
				[ "Silver", 10.49, "silver" ],
				[ "Gold", 19.30, "gold" ],
				[ "Platinum", 21.45, "color: #e5e4e2" ]
			] );

			var view = new google.visualization.DataView( data );
			view.setColumns( [ 0, 1, {
					calc: "stringify",
					sourceColumn: 1,
					type: "string",
					role: "annotation"
				},
				2
			] );

			var options = {
				title: "Density of Precious Metals, in g/cm^3",
				width: '100%',
				height: 400,
				bar: {
					groupWidth: "95%"
				},
				legend: {
					position: "none"
				},
			};
			var chart = new google.visualization.ColumnChart( document.getElementById( "columnchart_values" ) );
			chart.draw( view, options );
			
		}
	</script>
</head>
<script>
	jQuery( function ( $ ) {
		$( document ).ready( function () {
			$( "#aval_fisica" ).addClass( "active" );
		} );
	} );
</script>

<body>
	<main class="page-content pt-2">
		<div id="overlay" class="overlay"></div>
		<div class="container-fluid p-5">
			<h1>Gráficos da avaliação</h1>
			</div>
			<div class="row">
				<div class="col-sm-6 grafico" id="chart_div"></div>
				<div class="col-sm-6 grafico" id="columnchart_values"></div>
			</div>
		

	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
<script>
	function confirma( escolha, nome ) {
		if ( window.confirm( " Deseja deletar o parceiro " + nome + "?" ) ) {
			window.location = "../lib/deletar_parceiro?cnpj=" + escolha
		} else {
			return false

		}
	}
</script>
</html>