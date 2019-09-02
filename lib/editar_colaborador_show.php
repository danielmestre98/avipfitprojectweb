<?php 

require( '../conectar.php' );
$cpf = $_GET['cpf'];


$resulted = mysqli_query( $conn, "SELECT p.cpf, nome, p.telefone, email, dataNascimento, p.cidade, p.estado, p.cep, p.bairro, p.rua, p.numero, salario, funcao, s.cidade AS fcidade, s.bairro AS fbairro, s.estado AS festado, s.rua AS frua, s.numero AS fnumero, f.IdFilial AS filialid FROM pessoa p INNER JOIN funcionario f ON (p.cpf = f.cpf) INNER JOIN filial s ON (f.IdFilial = s.IdFilial) WHERE '$cpf' = p.cpf" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$nome = $row['nome'];
	$telefone = $row['telefone'];
	$email = $row['email'];
	$nascimento = $row['dataNascimento'];
	$cidade = $row['cidade'];
	$estado = $row['estado'];
	$cep = $row['cep'];
	$bairro = $row['bairro'];
	$rua = $row['rua'];
	$numero = $row['numero'];
	$salario = $row['salario'];
	$funcao = $row['funcao'];
	$fcidade = $row['fcidade'];
	$fbairro = $row['fbairro'];
	$festado = $row['festado'];
	$frua = $row['frua'];
	$fnumero = $row['fnumero'];
	$idfilial = $row['filialid'];
	


		

	
}
?>