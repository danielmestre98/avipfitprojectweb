<?php
    require('../conectar.php');
        
    if(isset($_POST['nome'])) {
        $treinamento = $_POST['nome'];
		$sql = "SELECT NomeTreinamento FROM treinamento WHERE NomeTreinamento = '$treinamento' AND inativo != '1'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>