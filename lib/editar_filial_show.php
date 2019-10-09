<?php 

require( '../conectar.php' );
$id = $_GET['id'];



$resulted = mysqli_query( $conn, "SELECT telefone, cidade, cnpj, cep, bairro, estado, rua, numero FROM filial WHERE '$id' = IdFilial" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$telefone = $row['telefone'];
	$cidade = $row['cidade'];
	$cep = $row['cep'];
	$cnpj = $row['cnpj'];
	$bairro = $row['bairro'];
	$estado = $row['estado'];
	$rua = $row['rua'];
	$numero = $row['numero'];


		

	
}
?>