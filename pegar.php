<?php
$filial = $_POST[ 'filial' ];
include( 'conectar.php' );
$sql = "SELECT dia FROM agenda WHERE evento = 'Aula experimental' AND filial = '$filial' GROUP BY dia";
$dias = [];
$result = mysqli_query( $conn, $sql )or die( mysqli_error( $conn ) );
while ( $row = mysqli_fetch_array( $result ) ) {
	if ( $row[ 'dia' ] == 'Domingo' )$dias[] = 0;
	if ( $row[ 'dia' ] == 'Segunda' )$dias[] = 1;
	if ( $row[ 'dia' ] == 'Terça' )$dias[] = 2;
	if ( $row[ 'dia' ] == 'Quarta' )$dias[] = 3;
	if ( $row[ 'dia' ] == 'Quinta' )$dias[] = 4;
	if ( $row[ 'dia' ] == 'Sexta' )$dias[] = 5;
	if ( $row[ 'dia' ] == 'Sábado' )$dias[] = 6;
}
mysqli_close( $conn );

$diasn = [ 0, 1, 2, 3, 4, 5, 6 ];
$disable = array_diff( $diasn, $dias );
$disable = array_values( $disable );

echo  json_encode( $disable );
?>