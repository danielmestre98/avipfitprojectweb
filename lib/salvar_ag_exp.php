<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$nome = $_POST[ 'nome' ];
$dia = $_POST[ 'dia' ];
$hora = $_POST[ 'hora' ];
$telefone = $_POST['numero'];
$treinamento = $_POST['treinamento'];
$email = $_POST['email'];
$filial = $_POST['filial'];
$hora = $_POST['hora'];
$data = explode( "/", $dia );

list( $dia, $mes, $ano ) = $data;
$diacomp = "$dia/$mes/$ano";
$data = "$ano-$mes-$dia";


$sql = "INSERT INTO agendamento (data, status, horario, tipo, idFilial, descricaoCancelamento)
		VALUES ('$data', 'Aguardando aprovação', '$hora', 'Aula Experimental', '$filial', '');";
if ($conn->query($sql) === TRUE) {
	$id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include ('../conectar.php');



$sql2 = "INSERT INTO agendamentoaulaexp (data, email, IdFilial, modalidadeTreinamento, nome, telefone, horario, id) VALUES ('$data', '$email', '$filial', '$treinamento', '$nome', '$telefone', '$hora', '$id')";

include ('../conectar.php');
if ($conn->query($sql2) === TRUE) {
	include ('../notificacao/novaExp.php');
	header( 'location: ../index?suc=1' );
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}



	



// Se houver mensagens de erro, exibe-as


?>