<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
session_start();
$cpf = $_SESSION[ 'cpf' ];
$dia = $_POST[ 'dia' ];
$hora = $_POST[ 'hora' ];
$filial = $_SESSION['filial'];
$hora = $_POST['hora'];
$data = explode( "/", $dia );

list( $mes, $dia, $ano ) = $data;

$data = "$ano-$mes-$dia";
$sql = "INSERT INTO agendamento (data, status, horario, tipo, idFilial, descricaoCancelamento)
		VALUES ('$data', 'Aguardando aprovação', '$hora', 'Avaliação Física', '$filial', '');";
$sql2 = "INSERT INTO  agendamentoavalfisicamensal (data, cpf, horario) VALUES ('$data', '$cpf', '$hora')";


if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include ('../conectar.php');
if ($conn->query($sql2) === TRUE) {
	header( 'location: ../aluno/agendamento' );
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}



	



// Se houver mensagens de erro, exibe-as


?>