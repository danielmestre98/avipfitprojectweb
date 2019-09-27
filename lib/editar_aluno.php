<?php

require( '../conectar.php' );
$cpfOld = $_POST[ 'cpfOld' ];
$cpf = $_POST[ 'cpf' ];
$nome = $_POST[ 'nome' ];
$email = $_POST[ 'email' ];
$foto = $_FILES[ "foto" ];
$telefone = $_POST[ 'telefone' ];
$nascimento = $_POST[ 'nascimento' ];
$cidade = addslashes($_POST['cidade']);
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
$idfilial = $_POST[ 'filial' ];


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
		$sql = "UPDATE pessoa SET cpf = '$cpf', dataNascimento = '$nascimento', email = '$email', nome = '$nome', telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero', foto = '$nome_imagem' WHERE cpf = '$cpfOld'";

		$sql2 = "UPDATE horario SET segunda = '$segunda', terca = '$terca', quarta = '$quarta', quinta = '$quinta', sexta = '$sexta', sabado = '$sabado' WHERE cpf = '$cpf'";

		$sql3 = "UPDATE realiza SET Treinamento = '$treinamento' WHERE cpf = '$cpf'";
		$sql4 = "UPDATE mensalidade SET valor = '$mensalidade', DataVencimento = '$pagamento' WHERE cpf = '$cpf'";
		$sql5 = "UPDATE cliente SET filial = '$idfilial' WHERE cpf = '$cpf'";


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
				session_start();
			if($_SESSION['tipoPessoa'] == '1'){
			header( 'location: ../admin/consulta_aluno' );}
			else{
			header ('location: ../colab/consulta_aluno');
			}
		} else {
			echo "Error: " . $sql5 . "<br>" . $conn->error;
		}
		mysqli_close( $conn );
	}
} else {
	$sql = "UPDATE pessoa SET cpf = '$cpf', dataNascimento = '$nascimento', email = '$email', nome = '$nome', telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', bairro = '$bairro', rua = '$rua', numero = '$numero' WHERE cpf = '$cpfOld'";

	$sql2 = "UPDATE horario SET segunda = '$segunda', terca = '$terca', quarta = '$quarta', quinta = '$quinta', sexta = '$sexta', sabado = '$sabado' WHERE cpf = '$cpf'";

	$sql3 = "UPDATE realiza SET Treinamento = '$treinamento' WHERE cpf = '$cpf'";
	$sql4 = "UPDATE mensalidade SET valor = '$mensalidade', DataVencimento = '$pagamento' WHERE cpf = '$cpf'";
	$sql5 = "UPDATE cliente SET filial = '$idfilial' WHERE cpf = '$cpf'";

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
		//header('location: ../admin/consulta_aluno');
	} else {
		echo "Error: " . $sql4 . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
	include( '../conectar.php' );
	if ( $conn->query( $sql5 ) === TRUE ) {
			session_start();
			if($_SESSION['tipoPessoa'] == '1'){
			header( 'location: ../admin/consulta_aluno' );
			}
			else{
			header ('location: ../colab/consulta_aluno');
			}
			
	} else {
		echo "Error: " . $sql5 . "<br>" . $conn->error;
	}
	mysqli_close( $conn );
}
?>