<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$nome = $_POST[ 'nomeExercicio' ];
$descricao = $_POST[ 'descricao' ];
$url = $_POST[ 'url' ];

$sql = "INSERT INTO exercicio (NomeExercicio, descricao, url)
		VALUES ('$nome', '$descricao', '$url');";


if ($conn->query($sql) === TRUE) {
   header('location: ../admin/consulta_exercicio');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );




	



// Se houver mensagens de erro, exibe-as


?>