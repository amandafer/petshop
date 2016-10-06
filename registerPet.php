<?php

session_start();

$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$Nome = isset($_POST["Nome"])? $_POST["Nome"] : null;
$Raca = isset($_POST["Raca"])? $_POST["Raca"] : null;
$Mes = isset($_POST["Mes"])? $_POST["Mes"] : null;
$Ano = isset($_POST["Ano"])? $_POST["Ano"] : null;
$Tipo = isset($_POST["Tipo"])? $_POST["Tipo"] : null;



echo "Nome: " . $Nome;
echo "<br>Raca: " . $Raca;
echo "<br>Mes: " . $Mes;
echo "<br>Ano: " . $Ano;
echo "<br>Tipo: " . $Tipo;
echo "<br>CPF: " . $SessaoCPF;

include "conexao.php";

$sql = "INSERT INTO pet (Nome, Raca, DataNascimento, Cao, CPF) VALUES ('" . $Nome . "', '" . $Raca . "', '" . $Ano . "-" . $Mes . "-01', 1, '" . $SessaoCPF . "');";
mysqli_query($con,$sql);

closeConection($con);
   
header("Location: index.php");    
exit();
?>