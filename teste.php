<html>
<body>

<?php
    include "conexao.php";
	
    $sql = "SELECT * FROM Servico";

?>

<table width=100% cellpading=0 cellspacing=0>
	<tr>
		<td>Servico</td>
		<td>Preco</td>
		<td>Nome</td>
	</tr>

<?php

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
?>

	<tr>
		<td><?php echo $row['IdServico'];?></td>
		<td><?php echo $row['Preco'];?></td>
		<td><?php echo $row['Nome'];?></td>
	</tr>
<?php
}
	closeConection($con);
?>
</table> 
</body>
</html>