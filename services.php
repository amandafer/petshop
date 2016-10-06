<?php

session_start();

include "conexao.php";

$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$sql = "SELECT Preco, Nome, Nivel, NULL AS TempoDuracao, NULL AS Observacao
		FROM servico S INNER JOIN servicohotel H ON S.IdServico = H.IdServico
		UNION
		SELECT Preco, Nome, NULL, TempoDuracao, NULL
		FROM servico S INNER JOIN servicobanhotosa B ON S.IdServico = B.IdServico
		UNION
		SELECT Preco, Nome, NULL, NULL, Observacao
		FROM servico S INNER JOIN servicoveterinario V ON S.IdServico = V.IdServico;";
				
$result = mysqli_query($con,$sql);
?>

<h1>Serviços</h1>
<div id="services">
<table class="table table-striped">
	<thead>
	  <tr>
		<th>Nome</th>
		<th>Preço</th>
		<th>Nivel do Hotel</th>
		<th>Tempo de Duração</th>
		<th>Observação</th>
	  </tr>
	</thead>
	<tbody>
	
	<?php
	while($row = mysqli_fetch_array($result))
	{
	?>
	  <tr>
		<td><?php echo $row['Nome'];?></td>
		<td><?php echo "R$ " . $row['Preco'];?></td>
		<td><?php echo $row['Nivel'];?></td>
		<td><?php echo $row['TempoDuracao'];?></td>
		<td><?php echo $row['Observacao'];?></td>
	  </tr>
	<?php
	}
		closeConection($con);
	?>
	</tbody>
</table>
</div>