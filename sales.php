<?php

session_start();

include "conexao.php";

$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$sql = "SELECT IdPet,
			   Nome,
			   Raca,
			   IF (MONTH(DataNascimento) > MONTH(CURDATE()), YEAR(CURDATE()) - YEAR(DataNascimento) - 1, YEAR(CURDATE()) - YEAR(DataNascimento)) AS Idade,
			   CASE Cao
				 WHEN 1 THEN 'Cachorro'
				 WHEN 0 THEN 'Gato'
			   END AS Tipo,
			   PrecoVenda
		FROM  pet P NATURAL JOIN venda V
		WHERE datavenda IS NULL
		ORDER BY Tipo DESC;";
				
$result = mysqli_query($con,$sql);
?>

<h1>Vendas</h1>
<div id="sales">
	<div class="info">
		<table class="table table-striped">
			<thead>
			  <tr>
				<th>Pet Name</th>
				<th>Preço</th>
				<th>Raça</th>
				<th>Idade</th>
				<th>Animal</th>
			  </tr>
			</thead>
			<tbody>
	
			<?php
			$contador = 1;
			while($row = mysqli_fetch_array($result))
			{
			?>
			  <tr>
				<td><?php echo $row['Nome'];?></td>
				<td><?php echo "R$ " . $row['PrecoVenda'];?></td>
				<td><?php echo $row['Raca'];?></td>
				<td><?php echo $row['Idade'] . " Anos";?></td>
				<td><?php echo $row['Tipo'];?></td>
				<td><?php if ($row['Tipo'] == "Gato")
				{
					echo "<img src='src/images/gato" . $contador . ".jpg'>";
				}
				else
				{
					echo "<img src='src/images/venda" . $contador . ".jpg'>";
				}
				?>
				</td>
			  </tr>
			<?php
			$contador += 1;
			}
				closeConection($con);
			?>
			</tbody>
		</table>
	</div>
</div>