<?php
    require('../conectar.php');
        
    if(isset($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
		$hora = $_POST['hora'];

		$dia = $_POST['dia'];
		$data = explode( "/", $dia );

		list( $dia, $mes, $ano ) = $data;

		$data = "$ano-$mes-$dia";
		
		$sql = "SELECT * FROM agendamentoavalfisicamensal WHERE cpf = '$cpf' AND data = '$data' AND horario = '$hora'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>