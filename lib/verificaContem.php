<?php


    require('../conectar.php');
    if(isset($_POST['exercicio'])) {
		$nome = $_POST['nome'];
        $exercicio = $_POST['exercicio'];
		$sql = "SELECT Exercicio FROM contem WHERE Exercicio = '$exercicio' and NomeTreinamento = '$nome'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){

           	echo "false";
        } else {
            echo "true";
        }
    }
?>