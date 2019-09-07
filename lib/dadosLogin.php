<?php
session_start();
require( '../conectar.php' );
$cpf = $_SESSION['cpf'];

$resulted = mysqli_query($conn, "SELECT nome, tipoPessoa, foto FROM pessoa WHERE '$cpf' = cpf");
if ( mysqli_num_rows( $resulted ) > 0 ) {
	$row = mysqli_fetch_assoc( $resulted );
	$nome = $row['nome'];
	$tipo = $row['tipoPessoa'];
	$foto = $row['foto'];
	
}

?>