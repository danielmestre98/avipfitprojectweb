<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
session_start();
$cpf = $_POST[ 'cpf' ];
$evento = $_POST[ 'evento' ];
$dsemana = $_POST[ 'dsemana' ];
$filial = $_SESSION['filial'];
$hora = $_POST['hora'];

$sql = "INSERT INTO agenda (dia, evento, horario, filial, cpffunc)
		VALUES ('$dsemana', '$evento', '$hora', '$filial', '$cpf');";


if ($conn->query($sql) === TRUE) {
   header('location: ../admin/ag_eventos');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );




	



// Se houver mensagens de erro, exibe-as


?>