<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos
$nome = $_POST[ 'nome' ];
$email = $_POST[ 'email' ];
$foto = $_FILES[ "foto" ];
$cpf = $_POST[ 'cpf' ];
$telefone = $_POST[ 'telefone' ];
$nascimento = $_POST[ 'nascimento' ];
$cidade = str_replace("'","",$_POST[ 'cidade' ]);
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$numero = $_POST[ 'numero' ];
$funcao = $_POST[ 'funcao' ];
$salario = $_POST[ 'salario' ];
$filial = $_POST[ 'filial' ];
$senha = md5( $_POST[ 'senha' ] );

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
}else{
	$nome_imagem = "padrao.jpg";
}
// Insere os dados no banco
$sql = "INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo)
		VALUES ('$cpf', '$nascimento', '$email', '$nome', '$telefone', '2', '$senha', '$nome_imagem', '$cidade', '$estado', '$cep', '$bairro', '$rua', '$numero', '0');";
$sql2 = "INSERT INTO funcionario (cpf, IdFilial, funcao, salario) VALUES ('$cpf', '$filial', '$funcao', '$salario'); ";


if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ($conn->query($sql2) === TRUE) {
	header('location: ../admin/consulta_colaborador');
   
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );



	



// Se houver mensagens de erro, exibe-as


?>