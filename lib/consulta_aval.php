<?php
require( '../conectar.php' );
session_start();
$tipo = $_SESSION[ 'tipoPessoa' ];
$filial = $_SESSION[ 'filial' ];
$data = [];
$sql = "SELECT p.nome, a.data, a.id, f.cidade, f.rua, f.numero, f.bairro, f.estado FROM avalfisica a INNER JOIN pessoa p ON (p.cpf= a.cpf) INNER JOIN cliente c ON (c.cpf = p.cpf) INNER JOIN filial f ON (f.IdFilial = c.filial)";

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