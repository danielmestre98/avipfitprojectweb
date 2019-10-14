<?php
    require('../conectar.php');
        
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
		$sql = "SELECT * FROM pessoa WHERE email = '$email'";
        $query = $conn->query($sql);
		$num_rows = $query->num_rows;
        if( $num_rows > 0 ){
           	echo "true";
        } else {
            echo "false";
        }
    }
?>