<?php
require( '../conectar.php' );
session_start();
$tipo = $_SESSION[ 'tipoPessoa' ];
$filial = $_SESSION[ 'filial' ];
$data = [];
$sql = "SELECT nome, tipo, status, a.horario, a.horafim, fil.cidade, fil.bairro, fil.estado, fil.rua, fil.numero, a.id, DATE_FORMAT(a.data,'%d/%m/%Y') AS data FROM agendamento a INNER JOIN agendamentoavalfisicamensal f ON (a.id = f.id) INNER JOIN pessoa p ON (f.cpf = p.cpf) INNER JOIN filial fil ON (a.idFilial = fil.IdFilial) WHERE a.status != 'Cancelado'";
$result = $conn->query( $sql );
mysqli_close( $conn );
include( '../conectar.php' );
$sql2 = "SELECT nome, tipo, status, a.horario, a.horafim, fil.cidade, fil.bairro, fil.estado, fil.rua, fil.numero, a.id, DATE_FORMAT(a.data,'%d/%m/%Y') AS data FROM agendamento a INNER JOIN agendamentoaulaexp e ON (a.id = e.id) INNER JOIN filial fil ON (a.idFilial = fil.IdFilial) WHERE a.status != 'Cancelado'";
$result2 = $conn->query( $sql2 );


while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {
	$row[ 'horario' ] = date( "H:i", strtotime( $row[ 'horario' ] ) );
	$row[ 'horafim' ] = date( "H:i", strtotime( $row[ 'horafim' ] ) );
	$data[] = $row;
}
while ( $row2 = $result2->fetch_array( MYSQLI_ASSOC ) ) {
	$row2[ 'horario' ] = date( "H:i", strtotime( $row2[ 'horario' ] ) );
	$row2[ 'horafim' ] = date( "H:i", strtotime( $row2[ 'horafim' ] ) );
	$data[] = $row2;
}



$results = [ "sEcho" => 1,
	"iTotalRecords" => count( $data ),
	"iTotalDisplayRecords" => count( $data ),
	"aaData" => $data
];;
echo json_encode( $results );

?>