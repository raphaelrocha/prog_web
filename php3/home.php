<?php
	session_start();
	if(!isset($_SESSION['login-prog-web'])){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8" />
	<title>Minha primeira página</title> 
</head> 
	<body>
		<h1>Este é um grande cabeçalho</h1>
		<h2>E este aqui é um pequeno cabeçalho</h2>
		<p>
		Aqui eu colocarei um paragrafo com texto aleatório, e a seguir vou inserir um formulário dentro da tabela. Além disso aqui vai um link: <a href="http://icomp.ufam.edu.br/">http://icomp.ufam.edu.br/. </a>
		</p>
		<div id="contact-form">
			<form id="contact" method="POST" action="form.php">
				Nome: <input type="text" name="nome" id="nome"/> <br/> <br/>
				Sexo: <select name="sexo" id="area">
						<option value="1">Masculino</option>
						<option value="2">Feminino</option>
					  </select> <br/> <br/>

				Comentários: <br/> <textarea name="mensagem" rows="4" cols="50"></textarea> <br/>
				<br/><br/>
				<input type="submit" name="submit" id="submit" value="enviar" >
			</form>
		</div>
	</body>
</html>