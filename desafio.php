<?php 

class Carro {

	function painel($m,$c,$f,$a,$ma,$t,$v) {
		echo "<div class='container-fluid'>";
		echo "----------------------------------------------------------------------<br>";
		echo "Modelo: ".$m."<br>"." - Cor: ".$c." - Fabricante: ".$f." - Ano: ".$a."<br>";
		echo "Marcha: ".$ma." - Tanque: ".$t." - Velocidade: ".$v."<br>";
		echo "----------------------------------------------------------------------<br>";
		echo "</div>";
	}
	function ligar($ma,$t,$v) {
		if($t > 0 && $v == 0 && $ma = "N") {
			echo "<h3>Carro ligado.</h3><br>";
		} else {
			if($t == 0) {
			}
		}

}

$acao = $_POST['acao'];
session_start();
$carro = new Carro();

switch($acao) {
	case 0:
		echo "<h1>Selecione uma ação</h1>";
		$_SESSION['modelo'] = $_POST['modelo'];
		$_SESSION['cor'] = $_POST['cor'];
		$_SESSION['fabricante'] = $_POST['fabricante'];
		$_SESSION['ano'] = $_POST['ano'];
		$_SESSION['marcha'] = $_POST['marcha'];
		$_SESSION['tanque'] = $_POST['tanque'];
		$_SESSION['marchaAtual'] = "N";
		$_SESSION['combMax'] = 0;
		$_SESSION['velocidade'] = 0;
		$carro->painel($_SESSION['modelo'],$_SESSION['cor'],$_SESSION['fabricante'],$_SESSION['ano'],$_SESSION['marcha'],$_SESSION['tanque'],$_SESSION['velocidade']);
		echo "<div class=containeir-fluid>";
		echo "<h1>Selecione uma ação</h1>";
		echo "</div>";
		break;
	case 1:
		$carro->ligar($_SESSION['marchaAtual'],$_SESSION['combAtual'],$_SESSION['velocidade']);
		$carro->painel($_SESSION['modelo'],$_SESSION['cor'],$_SESSION['fabricante'],$_SESSION['ano'],$_SESSION['marcha'],$_SESSION['tanque'],$_SESSION['velocidade']);
		break;
	case 7:
		
}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Desafio Polimorfismo</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<h3>Ações do automóvel</h3>
			</div>
			<div class="row">
				<div class="col-md-2">
					<form role="form" method="post">
						<div class="form-group">
							<select class="form-control" name="acao" id="acao">
								<option value="0">Selecione...</option>
								<option value="1">Mostrar painel</option>
								<option value="2">Ligar</option>
								<option value="3">Subir marcha</option>
								<option value="4">Descer marcha</option>
								<option value="5">Acelerar</option>
								<option value="6">Freiar</option>
								<option value="7">Desligar</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Ação</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
