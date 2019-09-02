<?php
include('../conectar.php');
$cpf = $_GET['cpf'];
mysqli_query( $conn,"UPDATE pessoa SET inativo = 1 WHERE cpf = '$cpf'");

header('location: ../admin/consulta_colaborador');
?>


<?php

?>