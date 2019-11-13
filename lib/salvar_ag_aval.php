<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
session_start();
$cpf = $_SESSION[ 'cpf' ];
$dia = $_POST[ 'dia' ];
$hora = $_POST[ 'hora' ];
$filial = $_SESSION['filial'];
$hora = explode(" - ", $hora);
list($horainicio,$horafim) = $hora;
$hora = $_POST['hora'];


$data = explode( "/", $dia );

list( $dia, $mes, $ano ) = $data;

$data = "$ano-$mes-$dia";
$sql = "INSERT INTO agendamento (data, status, horario, horafim, tipo, idFilial, descricaoCancelamento)
		VALUES ('$data', 'Aguardando aprovação', '$horainicio', '$horafim', 'Avaliação Física', '$filial', '');";
if ($conn->query($sql) === TRUE) {
$id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include ('../conectar.php');

$sql2 = "INSERT INTO  agendamentoavalfisicamensal (data, cpf, horario, id) VALUES ('$data', '$cpf', '$hora', '$id')";



if ($conn->query($sql2) === TRUE) {
	require('../notificacao/novaAval.php');
	header( 'location: ../aluno/agendamento' );
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}



	



// Se houver mensagens de erro, exibe-as


?>