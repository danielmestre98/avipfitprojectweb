<?php 
require('../conectar.php');
session_start();
if ($_SESSION['tipoPessoa'] == 2){
	$cpf = $_SESSION['filial'];
	$data = [];
	$sql = "SELECT dia, evento, horario, f.cidade, f.rua, f.numero, f.estado, f.bairro, p.nome, filial, a.id FROM agenda a INNER JOIN filial f ON (filial = IdFilial) INNER JOIN pessoa p ON (cpffunc = cpf) WHERE filial = '$cpf'";
	$result = $conn->query($sql);
}
else{
$data = [];
$sql = "SELECT dia, evento, horario, f.cidade, f.rua, f.numero, f.estado, f.bairro, p.nome, filial, a.id FROM agenda a INNER JOIN filial f ON (filial = IdFilial) INNER JOIN pessoa p ON (cpffunc = cpf)";
$result = $conn->query($sql);
}

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$row['horario'] = date("H:i", strtotime($row['horario']));
  	$data[] = $row;
}

$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];


echo json_encode($results);

?>