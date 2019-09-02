<?php 
	require_once("checar_login.php");
?>
<!DOCTYPE html>
<html><head>
		<title>PABX</title>
		<meta charset="UTF-8">
				
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/aviso.css">	
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../js/datatables.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
		


	</head>
	<body >
		
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">HSB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="area_admin">
          <i class="fa fa-utensils"></i>
          Cardápio
        </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="aviso">
          <i class="fa fa-bullhorn"></i>
          Comunicação interna
        </a>
      </li>
	<?php if (($_SESSION['nvlacesso']) >= 2){?>
     <li class="nav-item">
        <a class="nav-link active" href="pabx">
          <i class="fa fa-phone"></i>
          PABX
        </a>
      </li>
	<?php }?>	
    </ul>
	  <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="logout">
		<i class="fa fa-sign-out-alt"></i>
          Sair
        </a>
      </li>
  </div>
</nav>

		
		<div class="botoes">
			<button class="btn btn-primary btn-sm" onclick="window.location.href='pesquisa'" style="text-decoration:none; margin-left: 10px;">Gerar relatório</button>
			<button class="btn btn-primary btn-sm" onclick="window.location.href='novo_pabx'" style="text-decoration:none; float: right; margin-right: 10px;">Novo</button>
		</div>
		<div id="aviso" >
			<div class="table-responsive">
				<table data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped table-hover table-sm" data-page-length='8' id = "pabx">
					<?php
						include ("../conectar.php");
						$sql = $mysqli->prepare('Select id, data, solicitante, ramal, local, numero from pabx ORDER BY id DESC');
						$sql-> execute();
						$sql->bind_result($id, $data, $solicitante, $ramal, $local, $numero);
						echo "
						<thead>
							<tr>
								<th>ID</th>
								<th>Solicitante</th>
								<th>Ramal</th>
								<th>Local</th>
								<th>Número</th>
								<th>Data - Hora</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>";
							echo"
						</tbody>";
					?>
				</table>
			</div>
		</div>

	</body>
	<script src="../js/jQuery-3.3.1/jquery-3.3.1.js"></script>
	<script src="../js/moment.js"></script>
	
	<script src="../js/bootstrap.bundle.js"></script>
	<script src="../js/datatables.js"></script>
	<script src="../js/datetime.js"></script>
	<script>
		jQuery(function($){
			$(document).ready(function(){
				  $('[data-toggle="tooltip"]').tooltip(); 
				});
			$(document).ready( function () {
				
				$('#pabx').DataTable({
					
					"bLengthChange": false,
					        "language": {
								"zeroRecords": "Nenhum registro encontrado",
								"info": "Mostrando página _PAGE_ de _PAGES_",
								"infoEmpty": "Nenhum registro disponível",
								"infoFiltered": "(filtrado de _MAX_ registro totais)",
								"search": "Pesquisar",
								"first": "Primeiro",
								"pagingType": "simple",
								"processing":     "Carregando...",
								"paginate":{
									"last": "Último",
									"next": "Próxima",
									"previous": "Anteriror"
								},
								"emptyTable":     "Nenhum registro"
								
							},
							"responsive": true ,
							"autoWidth": false,
							  "bProcessing": true,
							  "sAjaxSource": "resposta.php",
					        "columns": [
							  { data: 'id' } ,
							  { data: 'solicitante' },
							  { data: 'ramal' },
							  { data: 'local' },
							  { data: 'numero' },
							  { data: 'data'},
							{ data: null, render: function ( data, type, row ) {
											return '<a href="editar_pabx.php?id='+data.id+'"><img border="0" src="../imagens/edit.jpg" name="Editar" title="Editar" width="25" height="25"></a>'											
								
								
								
										} }
							],
							columnDefs: [
								{targets:5, render:function(data){
      							return moment(data).format('DD/MM/YYYY - HH:mm');
    							}},
								{ "searchable": false, "targets": 6 },
								{ "orderable": false, "targets": 5 },
								{ "orderable": false, "targets": 4 },
								{"targets": 6,"orderable": false},
								{ width: 35, targets: 6 },
								
							]
					
				
					
				});
				
			} );
		});
	</script>	
</html>