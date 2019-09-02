<?php 
require('../conectar.php');


$sql = "Select nome, p.cpf, f.cidade, segunda, terca, quarta, quinta, sexta, sabado, Treinamento from pessoa p INNER JOIN cliente c ON (p.cpf = c.cpf) INNER JOIN filial f ON (c.filial = f.IdFilial) INNER JOIN horario h ON (p.cpf = h.cpf) INNER JOIN realiza r ON (p.cpf = r.cpf) where inativo = '0' and TipoPessoa = '3' ";
$result = $conn->query($sql) or die(mysqli_error($conn));


while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $data[] = $row;
}


$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];


echo json_encode($results);

?>