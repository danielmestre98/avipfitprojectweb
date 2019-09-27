<?php
    require('../conectar.php');
        
    if(isset($_POST['nomeExerciciou'])) {
        $exercicio = $_POST['nomeExerciciou'];
		$exercicioOld =$_POST['nomeOld'];
		$sql = "SELECT NomeExercicio FROM exercicio WHERE NomeExercicio = '$exercicio' AND NomeExercicio != '$exercicioOld'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>