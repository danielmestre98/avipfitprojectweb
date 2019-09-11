<link rel="stylesheet" href="teste.css">
<?php 
$data = $_POST['data'];

require_once __DIR__ . '/vendor/autoload.php';
include ("../conectar.php");
$sql = $conn->prepare('SELECT  from pabx WHERE cast(data as date) BETWEEN ? AND ? and ramal like ? and local like ? and replace(numero, " ", "") like ? ORDER BY id ASC');
$sql->bind_param("sssss",$dti, $dtf, $ra, $lo, $nu);
$sql-> execute();
$sql->bind_result($id, $data, $solicitante, $ramal, $local, $numero);
				
				
	$html = '
	<h2><b>Relatório de ligações</b></h2>
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