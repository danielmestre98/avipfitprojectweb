<?php 

require( '../conectar.php' );
$cnpj = $_GET['cnpj'];


$resulted = mysqli_query( $conn, "SELECT nome, cnpj, email, cidade, estado, cep, bairro, rua, numero, telefone FROM parceiro WHERE cnpj = '$cnpj'" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$nome = $row['nome'];
	$email = $row['email'];
	$cidade = $row['cidade'];
	$estado = $row['estado'];
	$cep = $row['cep'];
	$bairro = $row['bairro'];
	$rua = $row['rua'];
	$numero = $row['numero'];
	$telefone = $row['telefone'];
	


		

	
}
?>