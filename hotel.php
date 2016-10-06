<?php

session_start();

include "conexao.php";

$SessaoCPF = isset($_SESSION["cpf"])? $_SESSION["cpf"] : null;

$sql = "SELECT A.IdPet AS IdPet,
			   DATE_FORMAT(DataHoraEntrada, '%d/%m/%Y') AS DataEntrada,
			   S.Nome AS NomeHotel,
			   Nivel,
			   Preco,
			   P.Nome AS NomePet,
			   CONCAT(PE.PNome, ' ', PE.UNome) AS NomeCliente,
			   IF (DATEDIFF(CURDATE(), DataHoraEntrada) = 0, 1, DATEDIFF(CURDATE(), DataHoraEntrada)) AS Dias,
			   (Preco * IF (DATEDIFF(CURDATE(), DataHoraEntrada) = 0, 1, DATEDIFF(CURDATE(), DataHoraEntrada))) AS Valor
		FROM atendimentoservico A INNER JOIN servicohotel H ON A.IdServico = H.IdServico
			  INNER JOIN servico S ON H.IdServico = S.IdServico
			  INNER JOIN pet P ON P.IdPet = A.IdPet
			  INNER JOIN pessoa PE ON P.CPF = PE.CPF
		WHERE DataHoraSaida IS NULL AND A.CPF = '" . $SessaoCPF . "'
		order by 3;";
				
$result = mysqli_query($con,$sql);
?>

<h1>Hotel</h1>
<div id="hotel">
	<div id="projectCombo" class="input-append dropdown combobox">
		<input class="span2" type="text" value="Selecione o animal..." readonly="" data-value="2">
		<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>	       
		<ul class="dropdown-menu">
			<li><a href="#" data-value="2">Cachorro</a></li>
			<li><a href="#" data-value="1">Gato</a></li>
		</ul>
	</div>
	<p>Nome do Animal:</p><input type="text" placeholder="Nome do animal">
	<p>Cliente:</p><input type="text" placeholder="Cliente">
	<p>Nível:</p><input type="text" placeholder="Nível">
	<div class="info">
		<table class="table table-striped">
			<thead>
			  <tr>
				<th>#</th>
				<th>Pet Name</th>
				<th>Data de Entrada</th>
				<th>Hotel</th>
				<th>Pre&ccedil;o da di&aacute;ria</th>
				<th>Cliente</th>
				<th>Dias de hospedagem</th>
				<th>Valor at&eacute; o momento</th>
			  </tr>
			</thead>
			<tbody>
	
			<?php
			while($row = mysqli_fetch_array($result))
			{
			?>
			  <tr>
				<td><?php echo $row['IdPet'];?></td>
				<td><?php echo $row['NomePet'];?></td>
				<td><?php echo $row['DataEntrada'];?></td>
				<td><?php echo $row['NomeHotel'] . " - Nivel " . $row['Nivel'];?></td>
				<td><?php echo "R$ " . $row['Preco'];?></td>
				<td><?php echo $row['NomeCliente'];?></td>
				<td><?php echo $row['Dias'] . " dias";?></td>
				<td><?php echo "R$ " . $row['Valor'];?></td>
			  </tr>
			<?php
			}
				closeConection($con);
			?>
			</tbody>
		</table>
	</div>
</div>