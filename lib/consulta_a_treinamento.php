<?php 
require('../conectar.php');
session_start();
$cpf = $_SESSION['cpf'];
$data = [];
$sql = "SELECT Treinamento, Exercicio, url FROM realiza r INNER JOIN contem c ON (r.Treinamento = c.NomeTreinamento) INNER JOIN exercicio e ON (Exercicio = NomeExercicio) WHERE cpf = '$cpf'";
$result = $conn->query($sql);


while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $data[] = $row;
}


$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];


echo json_encode($results);

?>