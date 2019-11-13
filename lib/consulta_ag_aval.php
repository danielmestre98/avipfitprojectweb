<?php
$dia = $_GET[ 'dia' ];
include( '../conectar.php' );
session_start();
$filial = $_SESSION['filial'];

$data = explode( "/", $dia );

list( $dia, $mes, $ano ) = $data;

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

$sql = "SELECT horario, horafim FROM agenda WHERE dia = '$dias' AND evento = 'Avaliação física' AND filial = '$filial' ORDER BY horario";
$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
while ( $row = mysqli_fetch_array( $result ) ) {
	$resultado[] = date("H:i", strtotime($row['horario'])). ' - '.date("H:i", strtotime($row['horafim']));  
}
echo json_encode( $resultado );

?>