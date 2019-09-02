<?php
    
        
    if(isset($_POST['hora'])) {
		require('../conectar.php');
        $hora = $_POST['hora'];
		$dia = $_POST['dsemana'];
		$horaold = $_POST['horaold'];
		$diaold = $_POST['diaold'];
		$filial = $_POST['idfilial'];
		$id = $_POST['id'];
		
		$sql = "SELECT * FROM agenda WHERE dia = '$dia' and horario = '$hora' and filial = '$filial' and id != '$id'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>