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

	$conecta = mysql_connect("localhost", "root", "") or print (mysql_error());
	mysql_select_db("PROGWEB_RAPHAEL", $conecta) or print(mysql_error());
	print "Banco OK!</br>";

	$sql = "INSERT INTO COMENTARIO VALUES ('NULL','".$nome."','".$sexo."','".$mensagem."')";

	$result = mysql_query($sql, $conecta) or die (mysql_error());

	if ($result === TRUE) {
    	echo "Gravado com sucesso.<br>";
	} else {
	    echo "Falha: " . $sql . "<br>" . $conn->error;
	}

	mysql_close($conecta);

?>