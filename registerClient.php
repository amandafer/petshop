<?php

$PNome = isset($_POST["PNome"])? $_POST["PNome"] : null;
$UNome = isset($_POST["UNome"])? $_POST["UNome"] : null;
$CPF = isset($_POST["CPF"])? $_POST["CPF"] : null;
$Endereco = isset($_POST["Endereco"])? $_POST["Endereco"] : null;
$Telefone = isset($_POST["telefone[]"])? $_POST["telefone[]"] : null;
$Senha = isset($_POST["Senha"])? $_POST["Senha"] : null;



echo "Nome: " . $PNome;
echo "<br>Sobrenome: " . $UNome;
echo "<br>CPF: " . $CPF;
echo "<br>Endereco: " . $Endereco;
echo "<br>Telefone: " . $Telefone;
echo "<br>Senha: " . $Senha;

include "conexao.php";

$sql = "INSERT INTO pessoa (CPF, Senha, PNome, UNome) VALUES ('" . $CPF . "', '" . $Senha . "', '" . $PNome . "', '" . $UNome . "');";
mysqli_query($con,$sql);
	
$sql = "INSERT INTO cliente (Endereco, DataCadastro, CPF) VALUES ('" . $Endereco . "', CURDATE(), '" . $CPF . "');";
mysqli_query($con,$sql);

closeConection($con);
   
header("Location: index.php");    
exit();
?>