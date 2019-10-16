<?php 
require('../conectar.php');

$data = [];
$sql = "SELECT p.nome, status, p.cpf, id FROM depoimentos d INNER JOIN pessoa p ON (d.cpf=p.cpf)";
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