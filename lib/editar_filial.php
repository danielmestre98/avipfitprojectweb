<?php

require( '../conectar.php' );
$telefone = $_POST[ 'telefone' ];
$cidade = str_replace( "'", "", $_POST[ 'cidade' ] );
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$cnpj = $_POST['cnpje'];
$numero = $_POST[ 'numero' ];
$id = $_POST['id'];


// Se a foto estiver sido selecionada

	$sql = "UPDATE filial SET telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero', cnpj = '$cnpj' WHERE IdFilial = '$id'";


	if ( $conn->query( $sql ) === TRUE ) {
		header('location: ../admin/consulta_filial');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close( $conn );


?>