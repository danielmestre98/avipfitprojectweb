<link rel="stylesheet" href="teste.css">
<?php 
$data = $_POST['data'];
$filial = $_SESSION['filial'];

$data = explode( "/", $data );

list( $mes, $ano ) = $data;

$data = date("Y-m-t", mktime(0,0,0,$mes,'01',$ano)); 

require_once __DIR__ . '/vendor/autoload.php';
include ("../conectar.php");
$sql = $conn->prepare('SELECT rua, cidade, numero FROM filial ORDER BY idFilial ');

$sql-> execute();
$sql->bind_result($rua, $cidade, $numero);

				
	$html = '
	<h2><b>Relatório de relação de alunos</b></h2>
	<table>
		<thead>
							<tr>
							<td>Treinamento</td>	
							
								';

				 while($sql -> fetch()){ $html .= '
				<td>'.$rua.', '.$numero.', '.$cidade.'</td>'; } $html .='				   
				</tr>
				</thead>';

//mysqli_close($conn);
include ("../conectar.php");
$conn2 = new mysqli($host, $usuario, $senha, $bd);
$html .='<tbody>';
$sql2 = $conn->prepare('SELECT NomeTreinamento FROM treinamento GROUP BY NomeTreinamento ');
$sql2-> execute();
$sql2->bind_result($treinamento);
while($sql2 -> fetch()){
	$html .= '<tr><td>'.$treinamento.'</td>';
	$conn3 = new mysqli($host, $usuario, $senha, $bd);
	$sql3 = $conn3->prepare('SELECT idFilial FROM filial ORDER BY idFilial');
	$sql3-> execute();
	$sql3->bind_result($filial);
	while($sql3 -> fetch()){
		$conn4 = new mysqli($host, $usuario, $senha, $bd);
		$sql4 = $conn4->prepare("SELECT count(*) FROM relatorio WHERE IdFilial = '$filial' AND treinamento = '$treinamento' AND (datafim <= '$data' OR datafim IS NULL)");
		$sql4-> execute();
		$sql4->bind_result($contagem);
		while($sql4 -> fetch()){
		$html .= "<td>".$contagem."</td>";
		}
		//mysqli_close($conn3);
	}
	
	$html .='</tr>';
}

$html .=  '</table>';


$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("teste.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);

$mpdf->Output();

?>