<?php
session_start();
require( '../lib/dadosLogin.php' );
if (isset($_SESSION['tipoPessoa'])){
	if($_SESSION['tipoPessoa'] == 2){
		
	}
	else{
		header('location: ../index');
	}
}
else{
	header('location: ../index');
}
?>
<!DOCTYPE html>
<html>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/sidebar-themes.css">
<link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>



<div class="page-wrapper chiller-theme bg1">
	<div id="show-sidebar"><span title="Expandir menu" class="btn btn-dark" style="position: fixed; z-index: 50 border-bottom-left-radius: 0; border-top-left-radius: 0; margin-top: 50px;"><i title="Expandir menu" class="fas fa-bars"></i></span>
	</div>

	<nav id="sidebar" class="sidebar-wrapper">
		<div class="sidebar-content">
			<!-- sidebar-brand  -->
			<div class="sidebar-item sidebar-brand">
				<a title="Página inicial" href="principal">avipfit</a>
				<div id="close-sidebar">
					<i title="Recolher menu" class="fas fa-times"></i>
				</div>
			</div>

			<!-- sidebar-header  -->
			<div class="sidebar-item sidebar-header d-flex flex-nowrap">
				<div class="user-pic">
					<img class="img-responsive img-rounded" src="../fotos/<?=$foto?>" alt="User picture">
				</div>
				<div class="user-info">
					<span class="user-name"><?php echo $nome ?>
                        </span>
					<span class="user-role">Colaborador(a)</span>

				</div>
			</div>
			<!-- sidebar-menu  -->
			<div class=" sidebar-item sidebar-menu">
				<ul>
					<li id="cadastro" class="sidebar-dropdown">
						<a href="#">
                                <i class="far fa-folder-open"></i>
                                <span class="menu-text">Cadastros</span>
                            </a>
					

						<div id="cad_drop" class="sidebar-submenu">
							<ul>
								<li id="cad_exercicio">
									<a href="consulta_exercicio">Exercício</a>
								</li>
								<li id="cad_treinamento">
									<a href="consulta_treinamento">Treinamento</a>
								</li>
								<li id="cad_aluno">
									<a href="consulta_aluno">Aluno</a>
								</li>
							</ul>
						</div>
					</li>
					<li id="aval_fisica">
						<a href="aval_fisica">
                                <i class="fas fa-running"></i>
                                <span class="menu-text">Avaliação física</span>
                            </a>
					</li>
					<li id="agendamento" class="sidebar-dropdown">
						<a href="#">
                                <i class="far fa-calendar-alt"></i>
                                <span class="menu-text">Agendamentos</span>
                            </a>
					

						<div id="ag_drop" class="sidebar-submenu">
							<ul>
								<li id="ger_agenda">
									<a href="ag_eventos">Agenda de eventos</a>
								</li>
								<li id="ger_agendamentos">
									<a href="agendamentos">Gerenciar agendamentos</a>
								</li>
							</ul>
						</div>
					</li>
					<li id="mensalidades">
						<a href="mensalidades">
                                <i class="fas fa-dollar-sign"></i>
                                <span class="menu-text">Mensalidades</span>
                            </a>
					</li>
					<li id="depoimentos">
						<a href="depoimentos">
                                <i class="far fa-comment-dots"></i>
                                <span class="menu-text">Depoimentos</span>
                            </a>
					</li>
					<li id="filiais">
						<a href="filiais">
                                <i class="far fa-building"></i>
                                <span class="menu-text">Filiais</span>
                            </a>
					

					</li>
					<li id="parceiros">
						<a href="parceiros">
                                <i class="far fa-handshake"></i>
                                <span class="menu-text">Parceiros</span>
                            </a>
					

					</li>
					<li id="ajuda" class="sidebar-dropdown">
						<a href="#">
                                <i class="far fa-question-circle"></i>
                                <span class="menu-text">Ajuda</span>
                            </a>
					

						<div id="ajuda_drop" class="sidebar-submenu">
							<ul>
								<li id="tickets">
									<a href="tickets">Contatar o suporte</a>
								</li>
								<li id="manuais">
									<a href="manuais">Manuais</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- sidebar-menu  -->
		<div class="sidebar-footer">
			<div>
				<a href="../lib/logout">Logout
                        <i class="fa fa-power-off"></i>
                    </a>
			

			</div>
			<div class="pinned-footer">
				<a href="#" name="Logout">
                        <i class="fa fa-power-off"></i>
                    </a>
			
			</div>
		</div>

	</nav>
	<!-- page-content  -->


	<!-- page-wrapper -->


	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>



	<script src="../js/main.js"></script>


</html>