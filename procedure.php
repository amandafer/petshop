<?php

session_start();

include "conexao.php";

$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$sql = "SELECT P.Nome AS Nome,
			   P.Raca AS Raca,
			   CASE Cao
				 WHEN 1 THEN 'Cachorro'
				 WHEN 0 THEN 'Gato'
			   END AS Tipo,
			   S.Nome AS Servico,
			   S.Preco AS Preco,
			   IF (A.DataHoraEntrada = '0000-00-00', NULL, DATE_FORMAT(DataHoraEntrada, '%d/%m/%Y %H:%i')) AS DataHoraEntrada,
			   DATE_FORMAT(A.DataHoraSaida, '%d/%m/%Y %H:%i') AS DataHoraSaida
		FROM atendimentoservico A INNER JOIN pet P ON A.IdPet = P.IdPet
			 INNER JOIN servico S ON A.IdServico = S.IdServico
		WHERE (DataHoraSaida IS NULL OR DataHoraSaida = CURDATE()) AND A.IdPet IN (SELECT IdPet FROM pet WHERE CPF = '" . $SessaoCPF . "');";

				
$result = mysqli_query($con,$sql);
?>
<h1>Processos</h1>
<div id="procedure">
	<table class="table table-striped">
		<thead>
		  <tr>
			<th>#</th>
			<th>Pet Name</th>
			<th>Raça</th>
			<th>Animal</th>
			<th>Serviço</th>
			<th>Preço do Serviço</th>
			<th>Data de entrada</th>
			<th>Data de saída</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		$contador = 1;

		while($row = mysqli_fetch_array($result))
		{
		?>
		  <tr>
			<td><?php echo $contador;?></td>
			<td><?php echo $row['Nome'];?></td>
			<td><?php echo $row['Raca'];?></td>
			<td><?php echo $row['Tipo'];?></td>
			<td><?php echo $row['Servico'];?></td>
			<td><?php echo "R$ " . $row['Preco'];?></td>
			<td><?php echo $row['DataHoraEntrada'];?></td>
			<td><?php echo $row['DataHoraSaida'];?></td>
		  </tr>
		<?php
			$contador += 1;
		}
			closeConection($con);
		?>
		</tbody>
	</table>
</div>