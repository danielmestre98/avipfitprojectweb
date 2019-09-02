<?php
    require('../conectar.php');
        
    if(isset($_POST['nomeExercicio'])) {
        $exercicio = $_POST['nomeExercicio'];
		$sql = "SELECT NomeExercicio FROM exercicio WHERE NomeExercicio = '$exercicio'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>