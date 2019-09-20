<link rel="stylesheet" href="teste.css">
<?php 
$data = $_POST['data'];

$datahj = date("y-m-d");



require_once __DIR__ . '/vendor/autoload.php';
include ("../conectar.php");
$sql = $conn->prepare('SELECT Treinamento, count(*) FROM realiza r INNER JOIN pessoa p ON (r.cpf = p.cpf) GROUP BY Treinamento ');
$sql->bind_param("sssss",$dti, $dtf, $ra, $lo, $nu);
$sql-> execute();
$sql->bind_result($id, $data, $solicitante, $ramal, $local, $numero);
				
				
	$html = '
	<h2><b>Relatório de relação de alunos</b></h2>
	<table>
		<thead>
							<tr>
								<th>ID</th>
								<th>Solicitante</th>
								<th>Ramal</th>
								<th>Local</th>
								<th>Número</th>
								<th>Data - Hora</th>
								<th></th>
							</tr>
							
					</thead>
					<tbody>
							
								';

				 while($sql -> fetch()){ $html .= '<tr>
				<td>'.$id.'</td> 
				<td>'.$solicitante.'</td>
				<td>'.$ramal.'</td>
				<td>'.$local.'</td>
				<td>'.$numero.'</td>
				<td>'.$data.'</td>'; } $html .='				   
				</tr>
				<tr>
				
				</tr>
				</tbody> </table>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("teste.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);

$mpdf->Output();

?>