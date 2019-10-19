<?php
    require('../conectar.php');
        
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
		$hora = $_POST['hora'];
		$filial = $_POST['filial'];
		$dia = $_POST['dia'];
		$data = explode( "/", $dia );

		list( $dia, $mes, $ano ) = $data;

		$data = "$ano-$mes-$dia";
		
		$sql = "SELECT * FROM agendamentoaulaexp f  INNER JOIN agendamento a ON (a.id = f.id) WHERE email = '$email' AND f.data = '$data' AND f.IdFilial = '$filial' AND f.horario = '$hora'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>