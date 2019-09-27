<?php

require( '../conectar.php' );
$cnpjOld = $_POST[ 'cnpjOld' ];
$cnpj = $_POST['cnpj'];
$nome = $_POST[ 'nome' ];
$email = $_POST[ 'email' ];
$foto = $_FILES[ "foto" ];
$telefone = $_POST[ 'telefone' ];
$cidade = addslashes($_POST[ 'cidade' ]);
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$numero = $_POST[ 'numero' ];
	

// Se a foto estiver sido selecionada
if ( !empty( $foto[ "name" ] ) ) {

	// Tamanho máximo do arquivo em bytes


	$error = array();


	// Verifica se o tamanho da imagem é maior que o tamanho permitido

	// Se não houver nenhum erro
	if ( count( $error ) == 0 ) {

		// Pega extensão da imagem
		preg_match( "/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto[ "name" ], $ext );

		// Gera um nome único para a imagem
		$nome_imagem = md5( uniqid( time() ) ) . "." . $ext[ 1 ];

		// Caminho de onde ficará a imagem
		$caminho_imagem = "../fotos/" . $nome_imagem;

		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file( $foto[ "tmp_name" ], $caminho_imagem );
		$sql = "UPDATE parceiro SET cnpj = '$cnpj', email = '$email', nome = '$nome', telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero', foto = '$nome_imagem' WHERE cnpj = '$cnpjOld'";
		

		if ( $conn->query( $sql ) === TRUE ) {
			header('location: ../admin/parceiros');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		
	}
} else {
	$sql = "UPDATE parceiro SET cnpj = '$cnpj', email = '$email', nome = '$nome', telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero' WHERE cnpj = '$cnpjOld'";
	


	if ( $conn->query( $sql ) === TRUE ) {
		header('location: ../admin/parceiros');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
}
?>