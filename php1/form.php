<?php 

	$nome = $_GET['nome'];
	$sexo = $_GET['sexo'];
	$mensagem = $_GET['mensagem'];

	echo "Nome informado:".$nome." <br>";

	if($sexo == "1"){
		echo "Nome informado: Masculino <br>";
	}else if ($sexo == "2"){
		echo "Nome informado: Feminino <br>";
	}

	echo "Mensagem informada:".$mensagem." <br>";
?>