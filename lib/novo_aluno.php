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
$cidade = str_replace( "'", "", $_POST[ 'cidade' ] );
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$numero = $_POST[ 'numero' ];
$treinamento = $_POST[ 'treinamento' ];
$segunda = $_POST[ 'segunda' ];
$terca = $_POST[ 'terca' ];
$quarta = $_POST[ 'quarta' ];
$quinta = $_POST[ 'quinta' ];
$sexta = $_POST[ 'sexta' ];
$sabado = $_POST[ 'sabado' ];
$mensalidade = $_POST[ 'mensalidade' ];
$pagamento = $_POST[ 'pagamento' ];
$filial	= $_POST['filial'];
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
} else {
	$nome_imagem = "padrao.jpg";
}
date_default_timezone_set('America/Sao_Paulo');
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
// Insere os dados no banco
$sql = "INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo)
		VALUES ('$cpf', '$nascimento', '$email', '$nome', '$telefone', '3', '$senha', '$nome_imagem', '$cidade', '$estado', '$cep', '$bairro', '$rua', '$numero', '0');";
$sql2 = "INSERT INTO cliente (cpf, filial) VALUES ('$cpf', '$filial'); ";
$sql3 = "INSERT INTO horario (cpf, segunda, terca, quarta, quinta, sexta, sabado)
		VALUES ('$cpf', '$segunda', '$terca', '$quarta', '$quinta', '$sexta', '$sabado');";
$sql4 = "INSERT INTO realiza (cpf, Treinamento) VALUES ('$cpf', '$treinamento');";
$sql5 = "INSERT INTO mensalidade (cpf, valor, DataVencimento, status) VALUES ('$cpf', '$mensalidade', '$pagamento', '0');";


include('../conectar.php');

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ($conn->query($sql2) === TRUE) {
   
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ($conn->query($sql3) === TRUE) {
    
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ($conn->query($sql4) === TRUE) {
   
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include('../conectar.php');
if ($conn->query($sql5) === TRUE) {
    

} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}

include('../conectar.php');
$sql = str_replace( "'", " ", $sql );
$sql2 = str_replace( "'", " ", $sql2 );
$sql3 = str_replace( "'", " ", $sql3 );
$sql4 = str_replace( "'", " ", $sql4 );
$sql5 = str_replace( "'", " ", $sql5 );

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, cliente, horario, realiza, mensalidade', '$email2', '$sql $sql2 $sql3 $sql4 $sql5')";

if ( $conn->query( $log ) === TRUE ) {
		header('location: ../admin/consulta_aluno');
	
} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

// Se houver mensagens de erro, exibe-as


?>