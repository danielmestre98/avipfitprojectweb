<?php 

require( '../conectar.php' );
$id = $_GET['id'];



$resulted = mysqli_query( $conn, "SELECT dataNascimento, abdominalPer, biceps,massaCorporal, estatura, protocolo, subescapular, triceps, peitoral, axilarMedial, supraIliaca, panturrilha, abdominal, coxaProximal, ideal, meta  FROM avalfisica a INNER JOIN pessoa p ON (p.cpf = a.cpf) WHERE '$id' = id" );
if ( mysqli_num_rows( $resulted ) === 1 ) {
	
	$row = mysqli_fetch_assoc( $resulted );
	
	$nascimento = $row['dataNascimento'];
	$massa = $row['massaCorporal'];
	$estatura = $row['estatura'];
	$biceps = $row['biceps'];
	$subescapular = $row ['subescapular'];
	$triceps = $row['triceps'];
	$peitoral = $row['peitoral'];
	$axilar = $row['axilarMedial'];
	$ideal = $row['ideal'];
	$panturrilha = $row['panturrilha'];
	$abdominalper = $row['abdominalPer'];
	$meta = $row['meta'];
	$suparailiaca = $row['supraIliaca'];
	$abdominal = $row['abdominal'];
	$coxaprox = $row['coxaProximal'];
	$date = new DateTime($nascimento );
	$interval = $date->diff( new DateTime( date('Y-m-d') ) );
	$idade = $interval->format( '%Y' );
	$metabolismo = 66.47+(13.75*$massa)+(5*$estatura)-(6.76*$idade);
	switch ($row['protocolo']){
		case 1:
			$gordura = round( ((4.95/(1.112-0.00043499*($subescapular+$triceps+$peitoral+$axilar+$suparailiaca+$abdominal+$coxaprox)+0.00000055*(($subescapular+$triceps+$peitoral+$axilar+$suparailiaca+$abdominal+$coxaprox)*($subescapular+$triceps+$peitoral+$axilar+$suparailiaca+$abdominal+$coxaprox))-0.00028826*($idade)))-4.5)*100,0);
		break;
		case 2:
			$gordura = round(((4.95/(1.10938-0.0008267*($peitoral+$abdominal+$coxaprox)+0.0000016*($peitoral+$abdominal+$coxaprox)*($peitoral+$abdominal+$coxaprox)-0.0002574*($idade)))-4.5)*100, 0);
		break;
		case 3:
			$gordurai = round(((4.95/(1.10726863-0.00081201*($subescapular+$triceps+$suparailiaca+$panturrilha)+0.00000212*(($subescapular+$triceps+$suparailiaca+$panturrilha)*($subescapular+$triceps+$suparailiaca+$panturrilha))-0.00041761*($idade)))-4.5)*100, 0);
		break;
		case 4:
			$gordura = round((0.31457*($abdominalper)-0.10969*($massa)+10.8336),0);
		break;
		case 5:
			$gordura = round(((4.95/(1.162-0.063* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
		case 6:
			$gordura = round(((4.95/(1.1631-0.0632* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
		case 7:
			$gordura = round(((4.95/(1.1422-0.0544* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
		case 8:
			$gordura = round(((4.95/(1.162-0.07* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
		case 9:
			$gordura = round(((4.95/(1.1715-0.0779* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
		case 10:
			$gordura = round(((4.95/(1.1765-0.0744* log10($subescapular+$triceps+$suparailiaca+$biceps)))-4.5)*100, 2);
		break;
			
	}
	$pesogatual = round($massa * ($gordura/100), 2);
	$pesomatual = round($massa - $pesogatual, 2);
	$pesoideal = round($pesomatual/(1-($ideal/100)), 2);
	$pesoexcesso = round($massa - $pesoideal, 2);
	$pesogideal = round($pesogatual - $pesoexcesso, 2);
	$pesomideal = round($pesomatual + ($pesomatual * 5/100), 2);
	$novopeso = round($massa - ($massa * 4/100), 2);
	$novopesog = round($pesogatual - ($pesogatual * 20/100), 2);
	$novopesom = round($pesomatual + ($pesomatual * 5/100), 2);
	$grafico1m = ['Peso magro', $pesomatual];
	$grafico1g = ['Peso gordo', $pesogatual];
	$grafico1m = json_encode($grafico1m);
	$grafico1g = json_encode($grafico1g);
}
?>