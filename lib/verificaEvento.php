<?php
    
        
    if(isset($_POST['hora'])) {
		require('../conectar.php');
        $hora = $_POST['hora'];
		$dia = $_POST['dsemana'];
		session_start();
		$filial = $_SESSION['filial'];
		
		$sql = "SELECT * FROM agenda WHERE dia = '$dia' and horario = '$hora' and filial = '$filial'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>