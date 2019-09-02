<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$nome = $_POST[ 'exercicio' ];
$treinamento = $_GET[ 'nome' ];

$sql = "INSERT INTO contem (Exercicio, NomeTreinamento)
		VALUES ('$nome', '$treinamento');";


if ($conn->query($sql) === TRUE) {
   header('location: ../admin/novo_treinamento2?nome='.$treinamento);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );




	



// Se houver mensagens de erro, exibe-as


?>