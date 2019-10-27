<link rel="stylesheet" href="teste.css">
<?php 
$data = $_POST['data'];

$datahj = date("y-m-d");



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
							<td></td>	
							
								';

				 while($sql -> fetch()){ $html .= '
				<td>'.$rua.', '.$numero.', '.$cidade.'</td>'; } $html .='				   
				</tr>
				</thead>';
$html .=  '</table>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("teste.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);

$mpdf->Output();

?>