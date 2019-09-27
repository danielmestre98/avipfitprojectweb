<?php 
require('../conectar.php');
$nome = $_GET['nome'];
$data = [];
$sql = "Select Exercicio FROM contem WHERE NomeTreinamento = '$nome'";
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