<?php
include_once( 'nav.php' );
include('../lib/ver_aval.php');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
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
		 <div id="chart_div"></div>


		</div>
	</main>
	<!-- page-content" -->
	</div>
	<!-- page-content" -->
</body>
	<script>
		function confirma(escolha, nome){
			if ( window.confirm( " Deseja deletar o parceiro "+nome+"?" ) ) {
					window.location="../lib/deletar_parceiro?cnpj="+escolha
			} else {
				return false
				
			}
		}
	</script>
</html>