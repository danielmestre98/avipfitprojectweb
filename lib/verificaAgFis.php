<?php
    require('../conectar.php');
        
    if(isset($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
		$hora = $_POST['hora'];

		$dia = $_POST['dia'];
		$data = explode( "/", $dia );
		$hora = explode(" - ", $hora);
		list($horainicio,$horafim) = $hora;
		
		list( $dia, $mes, $ano ) = $data;

		$data = "$ano-$mes-$dia";
		
		$sql = "SELECT * FROM agendamentoavalfisicamensal f  INNER JOIN agendamento a ON (a.id = f.id) WHERE cpf = '$cpf' AND f.data = '$data' AND f.horario = '$horainicio'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>