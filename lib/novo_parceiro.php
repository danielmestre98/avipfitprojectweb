<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$nome = $_POST[ 'nome' ];
$email = $_POST[ 'email' ];
$foto = $_FILES[ "foto" ];
$cnpj = $_POST[ 'cnpj' ];
$telefone = $_POST[ 'telefone' ];
$cidade = str_replace( "'", "", $_POST[ 'cidade' ] );
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
	}
} else {
	$nome_imagem = "padrao.jpg";
}
date_default_timezone_set('America/Sao_Paulo');
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
// Insere os dados no banco
$sql = "INSERT INTO parceiro (cnpj, email, nome, telefone, foto, cidade, estado, cep, bairro, rua, numero)
		VALUES ('$cpf', '$email', '$nome', '$telefone', '$nome_imagem', '$cidade', '$estado', '$cep', '$bairro', '$rua', '$numero');";



include('../conectar.php');

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );

include('../conectar.php');
$sql = str_replace( "'", " ", $sql );

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, cliente, horario, realiza, mensalidade', '$email2', '$sql')";

if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/parceiros');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

// Se houver mensagens de erro, exibe-as


?>