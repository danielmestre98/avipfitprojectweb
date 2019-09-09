<?php 
require('../conectar.php');


$sql = "Select nome, p.cpf, telefone, funcao, IdFilial from pessoa p INNER JOIN funcionario f ON (p.cpf = f.cpf) where inativo = '0' and TipoPessoa = '2'";
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