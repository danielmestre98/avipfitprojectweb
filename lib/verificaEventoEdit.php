<?php
    
        
    if(isset($_POST['hora'])) {
		require('../conectar.php');
        $hora = $_POST['hora'];
		$dia = $_POST['dsemana'];
		$horafim = $_POST['horafim'];
		$diaold = $_POST['diaold'];
		$filial = $_POST['idfilial'];
		$id = $_POST['id'];
		
		$sql2 = "SELECT * FROM agenda WHERE '$hora' BETWEEN horario AND horafim AND dia = '$dia' AND filial = '$filial' AND id != '$id'";
		$sql = "SELECT * FROM agenda WHERE '$horafim' BETWEEN horario AND horafim AND filial = '$filial' AND dia = '$dia' AND id != '$id'";
		$sql3 = "SELECT * FROM agenda WHERE '$hora' = horario AND filial = '$filial' AND dia = '$dia' AND id != '$id'";
		$sql4 = "SELECT * FROM agenda WHERE '$horafim' = horafim AND filial = '$filial' AND dia = '$dia'AND id != '$id'";

        $query = $conn->query($sql);
		
		$num_rows = $query->num_rows;
		
		mysqli_close($conn);
		include('../conectar.php');
		$query = $conn->query($sql2);
		$num_rows += $query->num_rows;
		mysqli_close($conn);
		include('../conectar.php');
		$query = $conn->query($sql3);
		$num_rows += $query->num_rows;
		mysqli_close($conn);
		include('../conectar.php');
		$query = $conn->query($sql4);
		$num_rows += $query->num_rows;

        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>