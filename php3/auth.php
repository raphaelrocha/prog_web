<?php
if(isset($_POST["submit"])){
	if($_POST["submit"]=="entrar"){
		$login = "demo";
		$senha = "demo";
		if(($_POST["login"]==$login)AND($_POST["senha"]==$senha)){
			session_start();
			$_SESSION["login-prog-web"] = date("d/m/Y H:i:s");
			header("location: home.php");
		}else{
			session_start();
			$_SESSION["erro-login"]="1";
			header("location: index.php");
		}
	}
}
?>