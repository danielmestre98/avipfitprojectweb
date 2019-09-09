<?php 
require('../conectar.php');


$sql = "SELECT per.nome, DataVencimento, competencia, status from mensalidade m INNER JOIN pagamentos p ON (p.cpf = m.cpf) INNER JOIN pessoa per ON (per.cpf = m.cpf) where inativo = '0'";
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