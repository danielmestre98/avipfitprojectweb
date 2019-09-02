<?php 
session_start();
unset($_SESSION['cpf']);
unset($_SESSION['tipoPessoa']);
session_destroy();
header('location: ../index');
?>