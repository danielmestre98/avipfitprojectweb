<?php
    require('../conectar.php');
        
    if(isset($_POST['cnpj'])) {
        $cnpj = $_POST['cnpj'];
		$sql = "SELECT cnpj FROM filial WHERE cnpj = '$cnpj'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>