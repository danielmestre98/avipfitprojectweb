<?php
include('../conectar.php');
$cpf = $_GET['cpf'];
mysqli_query( $conn,"DELETE FROM pessoa WHERE cpf = '$cpf'");

header('location: ../admin/consulta_colaborador');
?>


<?php

?>