<?php
include('../conectar.php');
$nome = $_GET['nomeExercicio'];
$treinamento = $_GET['treinamento'];

mysqli_query( $conn,"DELETE from contem WHERE Exercicio = '$nome' and NomeTreinamento = '$treinamento'");

header('location: ../admin/novo_treinamento2?nome='.$treinamento);
?>


<?php

?>