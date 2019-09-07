<?php
session_start();
if(isset($_SESSION['tipoPessoa'])){
	if($_SESSION['tipoPessoa'] == 1){
		header('location: admin/principal');
	}
}
?>

<!DOCTYPE html>
<html>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar-themes.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>


	
    <div class="page-wrapper chiller-theme bg1">
		<div id="show-sidebar" style="position: fixed; z-index: 50"><span class="btn btn-dark fixed-btn" style="border-bottom-left-radius: 0; border-top-left-radius: 0; margin-top: 10px;"><i class="fas fa-bars"></i></span></div>
		
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <a href="index">avipfit</a>
					<div id="close-sidebar">
					<i class="fas fa-times"></i>
					</div>
                </div>

                <!-- sidebar-login  -->
                <div align="center" class="sidebar-item sidebar-header flex-nowrap">
                    <div align="center">
                        <a href="login" class="btn btn-outline-primary">Login</a>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li id="agendamento">
                            <a href="agendamento">
                                <i class="far fa-calendar-alt"></i>
                                <span class="menu-text">Agendamento</span>
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
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
        </nav>
        <!-- page-content  -->

	       
    <!-- page-wrapper -->

    <!-- using online scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- using local scripts -->
    <!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->
<script></script>

    <script src="js/main.js"></script>


</html>