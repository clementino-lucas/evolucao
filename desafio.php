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
	//função para ligar o automóvel
	//primeiro o sistema verifica se há combustível
	function ligar($ma,$ca,$vel) {
		if($ca > 0) {
			echo "<h3>Carro ligado.</h3><br>";
		} else {
			echo "<h3>Você precisa abastecer o carro.</h3><br>";
		}
	}
	//função para verificar o combustível atual do veículo e caso a variável $ca já possua o valor da variável $t, que é
	//o valor total do tanque, o sistema informa que o tanque está cheio
	function abastecer($ca,$t) {
		if($ca == $t) {
			echo "<h3>Tanque já está cheio.</h3><br>";
		} else {
			$ca = $t;
		}
		return $ca;
	}
	//função para subir as marchas do carro.
	//a variável $ma recebe o valor da marcha atual e caso o valor seja N, a variável recebe 1, caso não, é acrescentado +1
	function subir marcha($ma,$m) {
		if($ma == "N") {
			$ma = 1;
		} else {
			$ma++;
		}
		return $ma;
	}

}

//variável que captura a ação do comboBox com a ação do automóvel
$acao = $_POST['acao'];
//inicia a sessão e armazena as variáveis
session_start();
//instacia a classe Carro
//Aqui eu não preferi criar o método construtor, mas informo as variáveis para cada método das ações
$carro = new Carro();

//estrutura de decisão que define qual a ação do carro e qual o método deve ser acionado ao escolher no comboBox
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
		$carro->painel($_SESSION['modelo'],$_SESSION['cor'],$_SESSION['fabricante'],$_SESSION['ano'],$_SESSION['marchaAtual'],$_SESSION['combAtual'],$_SESSION['velocidade']);
		break;
	case 2:
		$_SESSION['marchaAtual'] = $carro->subirMarcha($_SESSION['marchaAtual'],$_SESSION['marcha']);
		$carro->painel($_SESSION['modelo'],$_SESSION['cor'],$_SESSION['fabricante'],$_SESSION['ano'],$_SESSION['marchaAtual'],$_SESSION['combAtual'],$_SESSION['velocidade']);
		break;
	case 7:
		$_SESSION['combAtual'] = $carro->abastecer($_SESSION['combAtual'],$_SESSION['tanque']);
		$carro->painel($_SESSION['modelo'],$_SESSION['cor'],$_SESSION['fabricante'],$_SESSION['ano'],$_SESSION['marchaAtual'],$_SESSION['combAtual'],$_SESSION['velocidade']);
		break;
}

 ?>

<!--Formulário html com o layout da página-->
<!DOCTYPE html>
<html>
	<head>
		<!-- Cabeçalho da página -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Desafio Polimorfismo</title>
		<!-- startando css do booststrap -->
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
