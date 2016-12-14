<?php 

class Carro {

	function painel($m,$c) {
		echo "----------------------------<br>";
		echo "Carro: ".$m."<br>";
		echo "Cor: ".$c."<br>";
		echo "----------------------------<br>";
	}

}

//$modelo = $_POST['modelo'];
//$cor = $_POST['cor'];
$acao = $_POST['acao'];

session_start();

$carro = new Carro();
function acao() {

}
switch($acao) {
	case "0":
		echo "<h1>Selecione uma ação</h1>";
		$_SESSION['modelo'] = $_POST['modelo'];
		$_SESSION['cor'] = $_POST['cor'];
		break;
	case "1":
		$carro->painel($_SESSION['modelo'],$_SESSION['cor']);
		break;
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
