<?php
include('../conectar.php');
$id = $_GET['id'];
$resulted = mysqli_query( $conn,"SELECT * FROM filial fi INNER JOIN cliente c ON (fi.IdFilial = filial) INNER JOIN funcionario f ON (fi.IdFilial = f.IdFilial) WHERE fi.IdFilial = '$id'") or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) > 0 ) {
	header('location: ../admin/consulta_filial?err=1');

}else{
mysqli_close( $conn );
include('../conectar.php');
mysqli_query( $conn,"DELETE FROM filial WHERE IdFilial = '$id'");

header('location: ../admin/consulta_filial');
}
?>
