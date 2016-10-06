<?php

session_start();

$SessaoPessoa = isset($_SESSION["pessoa"])? $_SESSION["pessoa"] : null;
$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$error = '';
$page = null;

if ($SessaoPessoa == 1) {
	$page = '/staff.php';
} else if ($SessaoPessoa == 2) {
	$page = '/client.php';
} else {
	if (isset($_POST['inputCPF'])) {
		$CPF = isset($_POST["inputCPF"])? $_POST["inputCPF"] : null;
		$Password = isset($_POST["inputPassword"])? $_POST["inputPassword"] : null;
		
		include "conexao.php";
			
		$sql = "SELECT P.CPF, P.PNome FROM pessoa P NATURAL JOIN funcionario F WHERE P.CPF = '" . $CPF . "' AND P.Senha = '" . $Password . "'";

		$result = mysqli_query($con,$sql);
		if (mysqli_num_rows($result) != 0) {
			$row = mysqli_fetch_array($result);
			
			//Pessoa = 1 -> Funcionário
			//Pessoa = 2 -> Cliente
			$_SESSION["pessoa"] = 1;
			$_SESSION["cpf"] = $row['CPF'];
			$_SESSION["name"] = $row['PNome'];
			
			$page = '/staff.php';
		}
		else
		{
			mysqli_free_result($result);
			
			$sql = "SELECT P.CPF, P.PNome FROM pessoa P NATURAL JOIN cliente C WHERE P.CPF = '" . $CPF . "' AND P.Senha = '" . $Password . "'";
			
			$result = mysqli_query($con,$sql);
			
			if (mysqli_num_rows($result) != 0)
			{
				$row = mysqli_fetch_array($result);
			
				//Pessoa = 1 -> Funcionário
				//Pessoa = 2 -> Cliente
				$_SESSION["pessoa"] = 2;
				$_SESSION["cpf"] = $row['CPF'];
				$_SESSION["name"] = $row['PNome'];
				
				mysqli_free_result($result);
				
				$page = '/client.php';
			}
			else
			{
				$error = "Login nao encontrado"; 
				$page = null;
			}
		}
		closeConection($con);
	}
}
	
if ($page !== null) {
	header('Location: ' . $page);
}

?>