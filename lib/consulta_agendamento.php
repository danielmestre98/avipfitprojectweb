<?php 
require('../conectar.php');
session_start();
$tipo = $_SESSION['tipoPessoa'];
$filial = $_SESSION['filial'];
	$data = [];
	$sql = "SELECT nome, tipo, status, a.horario, a.data, fil.cidade, fil.bairro, fil.estado, fil.rua, fil.numero FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.horario = f.horario and a.data = f.data) INNER JOIN pessoa p ON (f.cpf = p.cpf) INNER JOIN filial fil ON (a.idFilial = fil.IdFilial) WHERE a.status != 'Cancelado'";
	$result = $conn->query($sql);
	mysqli_close($conn);
	include ('../conectar.php');
	$sql2 = "SELECT nome, tipo, status, a.horario, a.data, fil.cidade, fil.bairro, fil.estado, fil.rua, fil.numero FROM agendamento a INNER JOIN agendamentoaulaexp e ON (a.horario = e.horario and a.data = e.data) INNER JOIN filial fil ON (a.idFilial = fil.IdFilial) WHERE a.status != 'Cancelado'";
	$result2 = $conn->query($sql2);


while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $data[] = $row;
}
while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
  $data[] = $row2;
}



$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
;
echo json_encode($results);

?>