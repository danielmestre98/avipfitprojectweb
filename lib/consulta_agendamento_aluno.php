<?php 
require('../conectar.php');
session_start();
$cpf = $_SESSION['cpf'];
$data = [];

$sql = "SELECT tipo, a.id, status, a.horario, a.horafim, DATE_FORMAT(a.data,'%d/%m/%Y') AS dia FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.id = f.id) INNER JOIN pessoa p ON (f.cpf = p.cpf) WHERE f.cpf = '$cpf'";
$result = $conn->query($sql);
mysqli_close($conn);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$row['horario'] = date("H:i", strtotime($row['horario']));
	$row['horafim'] = date("H:i", strtotime($row['horafim']));
  	$data[] = $row;
}

$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
;
echo json_encode($results);

?>