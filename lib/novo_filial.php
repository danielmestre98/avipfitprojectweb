<?php
// Conexão com o banco de dados
include( '../conectar.php' );
//Recupera os dados dos campos

$telefone = $_POST[ 'telefone' ];
$cidade = str_replace("'","",$_POST[ 'cidade' ]);
$estado = $_POST[ 'estado' ];
$bairro = $_POST[ 'bairro' ];
$cep = $_POST[ 'cep' ];
$rua = $_POST[ 'rua' ];
$cnpj = $_POST['cnpj'];
$numero = $_POST[ 'numero' ];

// Se a foto estiver sido selecionada

$sql = "INSERT INTO filial (telefone, cidade, estado, cep, bairro, rua, numero, cnpj)
		VALUES ('$telefone', '$cidade', '$estado', '$cep', '$bairro', '$rua', '$numero', '$cnpj');";



if ($conn->query($sql) === TRUE) {
   header('location: ../admin/consulta_filial');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close( $conn );




	



// Se houver mensagens de erro, exibe-as


?>