<?php 
require('../conectar.php');

$data = [];
$sql = "Select nome, p.cpf, f.cidade, f.rua, f.numero, f.IdFilial, f.bairro, f.estado, segunda, terca, quarta, quinta, sexta, sabado, Treinamento from pessoa p INNER JOIN cliente c ON (p.cpf = c.cpf) INNER JOIN filial f ON (c.filial = f.IdFilial) INNER JOIN horario h ON (p.cpf = h.cpf) INNER JOIN realiza r ON (p.cpf = r.cpf) where inativo = '0' and TipoPessoa = '3' ";
$result = $conn->query($sql) or die(mysqli_error($conn));


while($row = $result->fetch_array(MYSQLI_ASSOC)){
	if (!empty($row['segunda'])){
		if(!empty($row['terca']) or !empty($row['quarta']) or !empty($row['quinta']) or !empty($row['sexta']) or !empty($row['sabado'])){
		$row['segunda'] = "Segunda ".$row['segunda'].", ";
		}else{
			$row['segunda'] = "Segunda ".$row['segunda'];
		}
	}
	if (!empty($row['terca'])){
		if(!empty($row['quarta']) or !empty($row['quinta']) or !empty($row['sexta']) or !empty($row['sabado'])){
		$row['terca'] = "Terça ".$row['terca'].", ";
		}else{
			$row['terca'] = "Terça ".$row['terca'];
		}
	}
	if (!empty($row['quarta'])){
		if(!empty($row['quinta']) or !empty($row['sexta']) or !empty($row['sabado'])){
		$row['quarta'] = "Quarta ".$row['quarta'].", ";
		}else{
			$row['quarta'] = "Quarta ".$row['quarta'];
		}
		
	}
	if (!empty($row['quinta'])){
		if(!empty($row['sexta']) or !empty($row['sabado'])){
		$row['quinta'] = "Quinta ".$row['quinta'].", ";
		}else{
			$row['quinta'] = "Quinta ".$row['quinta'];
		}
	}
	if (!empty($row['sexta'])){
		if(!empty($row['sabado'])){
		$row['sexta'] = "Sexta ".$row['sexta'].", ";
		}else{
			$row['sexta'] = "Sexta ".$row['sexta'];
		}
	}
	if (!empty($row['sabado'])){
		$row['sabado'] = "Sábado ".$row['sabado'];
	}
  $data[] = $row;
	
}


$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];


echo json_encode($results);

?>