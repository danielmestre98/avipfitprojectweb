<?php 
require('../conectar.php');

$data = [];
$sql = "SELECT dia, evento, horario, f.cidade, f.rua, f.numero, f.estado, f.bairro, p.nome, filial, a.id FROM agenda a INNER JOIN filial f ON (filial = IdFilial) INNER JOIN pessoa p ON (cpffunc = cpf)";
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