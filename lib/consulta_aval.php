<?php
require( '../conectar.php' );
session_start();
$tipo = $_SESSION[ 'tipoPessoa' ];
$filial = $_SESSION[ 'filial' ];
$data = [];
$sql = "SELECT p.nome, a.data, a.id FROM avalfisica a INNER JOIN pessoa p ON (p.cpf= a.cpf)";
$result = $conn->query( $sql );
mysqli_close( $conn );



while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {
	$teste = explode( "-", $row['data'] );

	list( $ano, $mes, $dia ) = $teste;

	$row['data'] = "$dia/$mes/$ano";
	
	$data[] = $row;
}



$results = [ "sEcho" => 1,
	"iTotalRecords" => count( $data ),
	"iTotalDisplayRecords" => count( $data ),
	"aaData" => $data
];;
echo json_encode( $results );

?>