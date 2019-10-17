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
$cidade = addslashes( $_POST[ 'cidade' ] );
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
$filial = $_POST[ 'filial' ];
$senha = md5( $_POST[ 'senha' ] );

$inativo = "SELECT cpf FROM pessoa WHERE cpf = '$cpf'";
$query = $conn->query( $inativo );
$num_rows = $query->num_rows;
mysqli_close($conn);
include ('../conectar.php');
if ( $num_rows > 0 ) {
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
date_default_timezone_set( 'America/Sao_Paulo' );
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
$datacad = date( 'Y-m-d' );
// Insere os dados no banco
$sql = "UPDATE pessoa SET dataNascimento = '$nascimento', email = '$email', nome = '$nome', telefone = '$telefone', TipoPessoa = '3', senha = '$senha', foto = '$nome_imagem', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero', inativo = '0' WHERE cpf = '$cpf'";
$sql2 = "UPDATE cliente SET filial = '$filial' WHERE cpf = '$cpf'";
$sql3 = "UPDATE horario SET  segunda = '$segunda', terca = '$terca', quarta = '$quarta', quinta = '$quinta', sexta = '$sexta', sabado = '$sabado' WHERE cpf = '$cpf'";
$sql4 = "UPDATE realiza SET Treinamento = '$treinamento' WHERE cpf = '$cpf'";
$sql5 = "UPDATE mensalidade SET valor = '$mensalidade', DataVencimento = '$pagamento' WHERE cpf = '$cpf'";
$hoje = date( "m/Y" );


include( '../conectar.php' );

if ( $conn->query( $sql ) === TRUE ) {

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql2 ) === TRUE ) {

} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql3 ) === TRUE ) {

} else {
	echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql4 ) === TRUE ) {

} else {
	echo "Error: " . $sql4 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql5 ) === TRUE ) {


} else {
	echo "Error: " . $sql5 . "<br>" . $conn->error;
}
include( '../conectar.php' );
$repetido = "SELECT cpf FROM pagamentos WHERE competencia = '$hoje'";
$query = $conn->query( $repetido );
$num_rows = $query->num_rows;
mysqli_close($conn);
include ('../conectar.php');
	if ( $num_rows > 0 ) {
$sql6 = "INSERT INTO pagamentos (cpf, status, competencia) VALUES ('$cpf', 'Pendente', '$hoje')";
	}
if ( $conn->query( $sql6 ) === TRUE ) {

} else {
	echo "Error: " . $sql6 . "<br>" . $conn->error;
}
mysqli_close( $conn );

include( '../conectar.php' );
$sql = addslashes($sql);
$sql2 = addslashes($sql2);
$sql3 = addslashes($sql3);
$sql4 = addslashes($sql4);
$sql5 = addslashes($sql5);

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, cliente, horario, realiza, mensalidade', '$email2', '$sql $sql2 $sql3 $sql4 $sql5')";

if ( $conn->query( $log ) === TRUE ) {
	session_start();
	if ( $_SESSION[ 'tipoPessoa' ] == '1' ) {
		header( 'location: ../admin/consulta_aluno' );
	} else {
		header( 'location: ../colab/consulta_aluno' );
	}

} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

// Se houver mensagens de erro, exibe-as
	
} //-----------------------------------------------------------------------------------------------------------------------------------
else{

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
date_default_timezone_set( 'America/Sao_Paulo' );
session_start();
$email2 = $_SESSION[ 'email' ];
$ip = $_SERVER[ 'REMOTE_ADDR' ];
$data = date( 'Y-m-d H:i:s' );
$datacad = date( 'Y-m-d' );
// Insere os dados no banco
$sql = "INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo, cadastro)
		VALUES ('$cpf', '$nascimento', '$email', '$nome', '$telefone', '3', '$senha', '$nome_imagem', '$cidade', '$estado', '$cep', '$bairro', '$rua', '$numero', '0', '$datacad');";
$sql2 = "INSERT INTO cliente (cpf, filial) VALUES ('$cpf', '$filial'); ";
$sql3 = "INSERT INTO horario (cpf, segunda, terca, quarta, quinta, sexta, sabado)
		VALUES ('$cpf', '$segunda', '$terca', '$quarta', '$quinta', '$sexta', '$sabado');";
$sql4 = "INSERT INTO realiza (cpf, Treinamento) VALUES ('$cpf', '$treinamento');";
$sql5 = "INSERT INTO mensalidade (cpf, valor, DataVencimento) VALUES ('$cpf', '$mensalidade', '$pagamento');";
$hoje = date( "m/Y" );
$sql6 = "INSERT INTO pagamentos (cpf, status, competencia) VALUES ('$cpf', 'Pendente', '$hoje')";


include( '../conectar.php' );

if ( $conn->query( $sql ) === TRUE ) {

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql2 ) === TRUE ) {

} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql3 ) === TRUE ) {

} else {
	echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql4 ) === TRUE ) {

} else {
	echo "Error: " . $sql4 . "<br>" . $conn->error;
}
mysqli_close( $conn );
include( '../conectar.php' );
if ( $conn->query( $sql5 ) === TRUE ) {


} else {
	echo "Error: " . $sql5 . "<br>" . $conn->error;
}
include( '../conectar.php' );

if ( $conn->query( $sql6 ) === TRUE ) {

} else {
	echo "Error: " . $sql6 . "<br>" . $conn->error;
}
mysqli_close( $conn );

include( '../conectar.php' );
$sql = str_replace( "'", " ", $sql );
$sql2 = str_replace( "'", " ", $sql2 );
$sql3 = str_replace( "'", " ", $sql3 );
$sql4 = str_replace( "'", " ", $sql4 );
$sql5 = str_replace( "'", " ", $sql5 );

$log = "INSERT INTO log (ip, data, tabela, usuario, codigo) VALUES ('$ip', '$data', 'pessoa, cliente, horario, realiza, mensalidade', '$email2', '$sql $sql2 $sql3 $sql4 $sql5')";

if ( $conn->query( $log ) === TRUE ) {
	session_start();
	if ( $_SESSION[ 'tipoPessoa' ] == '1' ) {
		header( 'location: ../admin/consulta_aluno' );
	} else {
		header( 'location: ../colab/consulta_aluno' );
	}

} else {
	echo "Error: " . $log . "<br>" . $conn->error;
}
mysqli_close( $conn );

// Se houver mensagens de erro, exibe-as
}

?>