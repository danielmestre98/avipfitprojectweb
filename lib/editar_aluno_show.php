<?php 

require( '../conectar.php' );
$cpf = $_GET['cpf'];


$resulted = mysqli_query( $conn, "SELECT p.cpf, sexo, nome, p.telefone, email, dataNascimento, p.cidade, p.estado, p.cep, p.bairro, p.rua, p.numero, Treinamento, segunda, terca, quarta, quinta, sexta, sabado, valor, DataVencimento, f.rua AS rua_filial, f.numero AS num_filial, f.bairro AS bairro_filial, f.cidade AS cidade_filial, f.estado AS estado_filial, f.IdFilial as filialid  FROM pessoa p INNER JOIN realiza e ON (p.cpf = e.cpf) INNER JOIN horario h ON (p.cpf = h.cpf) INNER JOIN mensalidade m ON (p.cpf = m.cpf) INNER JOIN cliente c ON (p.cpf = c.cpf) INNER JOIN filial f ON (c.filial = f.IdFilial) WHERE '$cpf' = p.cpf" ) or die(mysqli_error($conn));
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$nome = $row['nome'];
	$telefone = $row['telefone'];
	$email = $row['email'];
	$sexo = $row['sexo'];
	$nascimento = $row['dataNascimento'];
	$cidade = $row['cidade'];
	$estado = $row['estado'];
	$cep = $row['cep'];
	$bairro = $row['bairro'];
	$rua = $row['rua'];
	$numero = $row['numero'];
	$treinamento = $row['Treinamento'];
	$segunda = $row['segunda'];
	$terca = $row['terca'];
	$quarta = $row['quarta'];
	$quinta = $row['quinta'];
	$sexta = $row['sexta'];
	$sabado = $row['sabado'];
	$valor = $row['valor'];
	$vencimento = $row['DataVencimento'];
	$frua = $row['rua_filial'];
	$fnum = $row['num_filial'];
	$fbairro = $row['bairro_filial'];
	$festado = $row['estado_filial'];
	$fcidade = $row['cidade_filial'];
	$idfilial = $row['filialid'];
	

		

	
}
?>