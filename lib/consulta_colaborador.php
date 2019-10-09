<?php 
require('../conectar.php');

$data = [];
$sql = "Select nome, p.cpf, p.telefone, funcao, fi.cidade, fi.rua, fi.numero, f.IdFilial, fi.bairro, fi.estado from pessoa p INNER JOIN funcionario f ON (p.cpf = f.cpf) INNER JOIN filial fi ON (fi.IdFilial = f.IdFilial) where inativo = '0' and TipoPessoa = '2'";
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