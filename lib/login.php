<?php
require( '../conectar.php' );
$email = $_POST[ 'email' ];
$senha = md5( $_POST[ 'senha' ] );




$resulted = mysqli_query( $conn, "SELECT tipoPessoa, cpf FROM pessoa WHERE '$email' = email and '$senha' = senha" );
if ( mysqli_num_rows( $resulted ) > 0 ) {
	$row = mysqli_fetch_assoc( $resulted );
	if ( $row[ 'tipoPessoa' ] == 1 ) {
		$cpf2 = $row[ 'cpf' ];
		mysqli_close( $conn );
		include( '../conectar.php' );
		$resulted2 = mysqli_query( $conn, "SELECT IdFilial FROM funcionario WHERE cpf = '$cpf2'" );
		$row2 = mysqli_fetch_assoc( $resulted2 );
		session_start();
		$_SESSION[ 'filial' ] = $row2[ 'IdFilial' ];
		$_SESSION[ 'tipoPessoa' ] = $row[ 'tipoPessoa' ];
		$_SESSION[ 'cpf' ] = $row[ 'cpf' ];
		$_SESSION[ 'email' ] = $email;
		header( 'location: ../admin/principal' );
	} else {
		if ( $row[ 'tipoPessoa' ] == 2 ) {
			$cpf2 = $row[ 'cpf' ];
			mysqli_close( $conn );
			include( '../conectar.php' );
			$resulted2 = mysqli_query( $conn, "SELECT IdFilial FROM funcionario WHERE cpf = '$cpf2'" );
			$row2 = mysqli_fetch_assoc( $resulted2 );
			session_start();
			$_SESSION[ 'filial' ] = $row2[ 'IdFilial' ];
			$_SESSION[ 'tipoPessoa' ] = $row[ 'tipoPessoa' ];
			$_SESSION[ 'cpf' ] = $cpf2;
			$_SESSION[ 'email' ] = $email;
			header( 'location: ../colab/principal' );
		} else {
			if ( $row[ 'tipoPessoa' ] == 3 ) {
				$cpf2 = $row[ 'cpf' ];
				mysqli_close( $conn );
				include( '../conectar.php' );
				$resulted2 = mysqli_query( $conn, "SELECT filial FROM cliente WHERE cpf = '$cpf2'" );
				$row2 = mysqli_fetch_assoc( $resulted2 );
				session_start();
				$_SESSION[ 'filial' ] = $row2[ 'filial' ];
				$_SESSION[ 'tipoPessoa' ] = $row[ 'tipoPessoa' ];
				$_SESSION[ 'cpf' ] = $cpf2;
				$_SESSION[ 'email' ] = $email;
				
				header( 'location: ../aluno/principal' );
			}
			else{
				if($row['tipoPessoa'] == 4){
					$cpf2 = $row[ 'cpf' ];
					mysqli_close( $conn );
					include( '../conectar.php' );
					$resulted2 = mysqli_query( $conn, "SELECT filial FROM cliente WHERE cpf = '$cpf2'" );
					$row2 = mysqli_fetch_assoc( $resulted2 );
					session_start();
					$_SESSION[ 'filial' ] = $row2[ 'filial' ];
					$_SESSION[ 'tipoPessoa' ] = $row[ 'tipoPessoa' ];
					$_SESSION[ 'cpf' ] = $cpf2;
					$_SESSION[ 'email' ] = $email;	
					header( 'location: ../suporte/principal' );
				}
			}
		}
	}

} else {
	session_start();
	$_SESSION[ 'message' ] = 'E-mail ou senha inválidos.';
	$_SESSION[ 'email' ] = $email;
	header( 'location: ../login' );
}


?>