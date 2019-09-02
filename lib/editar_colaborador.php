<?php

require( '../conectar.php' );
$cpf = $_POST[ 'cpfUpdate' ];
$nome = $_POST[ 'nome' ];
$email = $_POST[ 'email' ];
$foto = $_FILES[ "foto" ];
$telefone = $_POST[ 'telefone' ];
$nascimento = $_POST[ 'nascimento' ];
$cidade = str_replace( "'", "", $_POST[ 'cidade' ] );
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$cpfOld = $_POST['cpf'];
$numero = $_POST[ 'numero' ];
$filial = $_POST['filial'];
$salario = $_POST['salario'];
$funcao = $_POST['funcao'];
if ( !empty( $_POST[ 'senha' ] ) ) {
	$senha = md5( $_POST[ 'senha' ] );
}
else{
$resulted = mysqli_query($conn, "SELECT senha from pessoa where '$cpfOld' = cpf");
if ( mysqli_num_rows( $resulted ) > 0 ) {
	$row = mysqli_fetch_assoc( $resulted );
	$senha = $row['senha'];

	
}
	
}
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
		$sql = "UPDATE pessoa SET cpf = '$cpf', dataNascimento = '$nascimento', email = '$email', nome = '$nome', telefone = '$telefone', senha = '$senha', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero', foto = '$nome_imagem' WHERE cpf = '$cpfOld'";
		$sql2 = "UPDATE funcionario SET IdFilial = '$filial', salario = '$salario', funcao = '$funcao' WHERE cpf = '$cpf'";

		if ( $conn->query( $sql ) === TRUE ) {

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
		include( '../conectar.php' );
		if ( $conn->query( $sql2 ) === TRUE ) {
			header('location: ../admin/consulta_colaborador');

		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
	}
} else {
	$sql = "UPDATE pessoa SET cpf = '$cpf', dataNascimento = '$nascimento', email = '$email', nome = '$nome', telefone = '$telefone', senha = '$senha', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero' WHERE cpf = '$cpfOld'";
	$sql2 = "UPDATE funcionario SET IdFilial = '$filial', salario = '$salario', funcao = '$funcao' WHERE cpf = '$cpf'";


	if ( $conn->query( $sql ) === TRUE ) {

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
	include( '../conectar.php' );
	if ( $conn->query( $sql2 ) === TRUE ) {
		header('location: ../admin/consulta_colaborador');

	} else {
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
}
?>