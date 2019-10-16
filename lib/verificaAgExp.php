<?php
    require('../conectar.php');
        
    if(isset($_POST['email'])) {
        $email = $_POST['email'];

		$hora = date ("h:i:s", strtotime($_POST['hora']));
		$filial = $_POST['filial'];
		$dia = $_POST['dia'];
		$data = explode( "/", $dia );

		list( $dia, $mes, $ano ) = $data;

		$data = "$ano-$mes-$dia";
		
		$sql = "SELECT * FROM agendamentoaulaexp WHERE email = '$email' AND data = '$data' AND IdFilial = '$filial' AND horario = '$hora'";

        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>