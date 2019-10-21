<?php
// Conexão com o banco de dados
include( '../conectar.php' );
date_default_timezone_set( 'America/Sao_Paulo' );
//Recupera os dados dos campos
$foto = $_FILES[ "foto" ];
$descricao = addslashes( $_POST[ 'desc' ] );
$titulo = addslashes( $_POST[ 'nome_ticket' ] );
$agora = date( 'Y-m-d H:i:s' );

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
		$caminho_imagem = "../tickets/" . $nome_imagem;

		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file( $foto[ "tmp_name" ], $caminho_imagem );
	}
}else{
	$foto = "";
}
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
$datacad = date( 'Y-m-d' );
$cpf = $_SESSION[ 'cpf' ];
// Insere os dados no banco
$sql = "INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)
		VALUES ('$titulo', 'Não classificado', 'Aberto', 'Não classificado', '$cpf');";
include( '../conectar.php' );
if ( $conn->query( $sql ) === TRUE ) {
	$id = mysqli_insert_id( $conn );
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );

$sql2 = "INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES ('$id', '$descricao', '$foto', '$agora', 'User'); ";

include( '../conectar.php' );
if ( $conn->query( $sql2 ) === TRUE ) {

} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );

include( '../conectar.php' );
$sql = addslashes($sql);
$sql2 = addslashes($sql2);


$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, cliente, horario, realiza, mensalidade', '$email2', '$sql $sql2')";

if ( $conn->query( $log ) === TRUE ) {
	session_start();
	if ( $_SESSION[ 'tipoPessoa' ] == '1' ) {
		header( 'location: ../admin/tickets' );
	} else {
		if($_SESSION['tipoPessoa'] == '2'){
			header( 'location: ../colab/tickets' );
		}else{
			if($_SESSION['tipoPessoa'] == '3'){
				header('location: ../aluno/tickets');
			}
		}
	}

} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

// Se houver mensagens de erro, exibe-as


?>