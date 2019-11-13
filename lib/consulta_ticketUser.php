<?php 
require('../conectar.php');
session_start();
$cpf = $_SESSION['cpf'];

$data = [];
$sql = "SELECT id, titulo, classificacao, status, prioridade FROM ticket WHERE usuario = '$cpf' ORDER BY id DESC";
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