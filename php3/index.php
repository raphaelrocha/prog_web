<?php
	session_start();
	$erro="0";
	//SE JÁ EXISTIR SESSÃO, NÃO PEDE LOGIN NOVAMENTE.
	if(isset($_SESSION['login-prog-web'])){
		header("location: home.php");
	}
	//VERIFICA SE HOUVE ERRO DE LOGIN E EXIBE MENSAGEM DE REDE.
	if(isset($_SESSION["erro-login"])){
		if($_SESSION["erro-login"]=="1"){
			$erro="1";
			$_SESSION["erro-login"]="0";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8" />
	<link rel="stylesheet" href="styles.css">
	<title>Minha primeira página</title> 
</head> 
	<body>
		<h1>Login</h1>
		</p>
		<div id="contact-form">
			<form id="login-form" method="POST" action="auth.php">
				Nome: <input type="text" name="login" id="nome"/> <br/> <br/>
				Senha: <input type="password" name="senha" id="senha"/> <br/><br/>
				<input type="submit" name="submit" id="submit" value="entrar" >
				<?php if($erro=="1"):?>
					<p class="erro">Login ou senha inválidos.</p>
				<?php endif;?>
			</form>
		</div>
	</body>
</html>