<?php
session_start();
require( '../lib/dadosLogin.php' );

if ( isset( $_SESSION[ 'tipoPessoa' ] ) ) {
	if ( $_SESSION[ 'tipoPessoa' ] == 4 ) {

	} else {
		header( 'location: ../index' );
	}
} else {
	header( 'location: ../index' );
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
	<div id="show-sidebar"><span title="Expandir menu" class="btn btn-dark" style="border-bottom-left-radius: 0; border-top-left-radius: 0; margin-top: 10px; position: fixed; z-index: 10"><i class="fas fa-bars"></i></span>
	</div>

	<nav id="sidebar" class="sidebar-wrapper">
		<div class="sidebar-content">
			<!-- sidebar-brand  -->
			<div class="sidebar-item sidebar-brand">
				<a href="principal" title="Página inicial">avipfit</a>
				<div id="close-sidebar">
					<i class="fas fa-times" title="Recolher menu"></i>
				</div>
			</div>

			<!-- sidebar-login  -->
			<div class="sidebar-item sidebar-header d-flex flex-nowrap">
				<div class="user-pic">
					<img class="img-responsive img-rounded" src="../fotos/<?php echo $foto?>" alt="User picture">
				</div>
				<div class="user-info">
					<span class="user-name"><?php echo $nome ?>
                        </span>
					<span class="user-role">Analista</span>

				</div>
			</div>
			<!-- sidebar-menu  -->
			<div class=" sidebar-item sidebar-menu">
				<ul>
					<li id="ajuda" class="sidebar-dropdown">
						<a href="#">
                                <i class="far fa-question-circle"></i>
                                <span class="menu-text">Suporte</span>
                            </a>
					

						<div id="ajuda_drop" class="sidebar-submenu">
							<ul>
								<li id="tickets">
									<a href="tickets">Tickets</a>
								</li>
								<li id="manuais">
									<a href="manuais">Manuais</a>
								</li>
								<li id="backup">
									<a href="criarbackup.php">Backup</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<!-- sidebar-menu  -->
		</div>
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

	<!-- using online scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- using local scripts -->
	<!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->


	<script src="../js/main.js"></script>


</html>