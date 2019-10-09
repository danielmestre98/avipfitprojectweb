<?php
    require('../conectar.php');
        
    if(isset($_POST['cnpje'])) {
		$cnpj = $_POST['cnpje'];
		$cnpjold = $_POST['cnpjold'];
		$sql = "SELECT cnpj FROM filial WHERE cnpj = '$cnpj' AND cnpj != '$cnpjold'";
		
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>