<?php
    require('../conectar.php');
        
    if(isset($_POST['cnpj'])) {
        $cnpj = $_POST['cnpj'];
		$cnpjOld= $_POST['cnpjOld'];
		$sql = "SELECT cnpj FROM parceiro WHERE cnpj = '$cnpj' AND cnpj != '$cnpjOld'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "false";
        } else {
            echo "true";
        }
    }
?>