<?php
$dia = $_GET[ 'dia' ];
include( '../conectar.php' );
session_start();
$filial = $_SESSION['filial'];

$data = explode( "/", $dia );

list( $mes, $dia, $ano ) = $data;

$data = "$ano-$mes-$dia";
//$data = new DateTime($data);
$diadasemana = date( 'w', strtotime( $data ) );

if ( $diadasemana == 0 )$dias = 'Domingo';
if ( $diadasemana == 1 )$dias = 'Segunda';
if ( $diadasemana == 2 )$dias = 'Terça';
if ( $diadasemana == 3 )$dias = 'Quarta';
if ( $diadasemana == 4 )$dias = 'Quinta';
if ( $diadasemana == 5 )$dias = 'Sexta';
if ( $diadasemana == 6 )$dias = 'Sábado';

$sql = "SELECT horario FROM agenda WHERE dia = '$dias' AND evento = 'Avaliação física' AND filial = '$filial'";
$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
while ( $row = mysqli_fetch_array( $result ) ) {
	$resultado[] = $row['horario']; 
}
echo json_encode( $resultado );

?>