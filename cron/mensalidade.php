<?php
include( '../conectar.php' );
$sql = "SELECT competencia, status, DataVencimento, pag.cpf FROM pagamentos pag INNER JOIN pessoa p ON (pag.cpf = p.cpf) INNER JOIN mensalidade m ON (pag.cpf = m.cpf) WHERE status = 'Pendente'";

$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
mysqli_close( $conn );
$data2 = new DateTime();
while ( $row = mysqli_fetch_array( $result ) ) {
	$vencimento = $row['DataVencimento'].'/'.$row['competencia'];
	$vencimento = explode("/", $vencimento);
	list($dia, $mes, $ano) = $vencimento;
	$vencimento = $ano.'-'.$mes.'-'.$dia;
	$data1 = new DateTime($vencimento);
	if ($data1 < $data2){
		
		$cpf = $row['cpf'];
		$comp = $row['competencia'];
		$sql2 = "UPDATE pagamentos SET status = 'Em atraso' WHERE cpf = '$cpf' AND competencia = '$comp'";
		
		include('../conectar.php');
		if ( $conn->query( $sql2 ) === TRUE ) {
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		$data3 = date( 'Y-m-d H:i:s' );
		$sql2 = addslashes($sql2);
		$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('Automático', '$data3', 'pagamentos', 'Automático', '$sql2')";
		include('../conectar.php');
		if ( $conn->query( $log ) === TRUE ) {
		} else {
			echo "Error: " . $log . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		
		
	}
}

?>