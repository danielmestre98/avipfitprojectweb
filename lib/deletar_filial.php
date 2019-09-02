<?php
include('../conectar.php');
$id = $_GET['id'];
mysqli_query( $conn,"DELETE FROM filial WHERE IdFilial = '$id'");

header('location: ../admin/consulta_filial');
?>
