<?php 

require( '../conectar.php' );
$nome = $_GET['nome'];



$resulted = mysqli_query( $conn, "SELECT NomeExercicio, descricao, url FROM exercicio WHERE '$nome' = id" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$exercicio = $row['NomeExercicio'];
	$descricao = $row['descricao'];
	$url = $row['url'];


		

	
}
?>