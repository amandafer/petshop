<?php

if (isset($_POST['cpf'])) {

	include "conexao.php";

	$cpf = $_POST['cpf'];

	$sql = "SELECT  P.IdPet AS IdPet,
					A.id AS id,
					P.Nome AS NomePet,
					PE.PNome AS NomeCliente,
					S.Nome AS Servico,
					IF (A.DataHoraEntrada = '0000-00-00', NULL, CONVERT(DataHoraEntrada, TIME)) AS DataHoraEntrada
			FROM atendimentoservico A INNER JOIN pet P ON A.IdPet = P.IdPet
				INNER JOIN servico S ON A.IdServico = S.IdServico
				INNER JOIN pessoa PE ON PE.CPF = P.CPF
			WHERE DataHoraSaida IS NULL AND A.CPF = '" . $cpf . "';";
					
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result))
	{
	echo '<tr>
		<td>' . $row['IdPet'] . '</td>
		<td>' . $row['NomePet'] . '</td>
		<td>' . $row['NomeCliente'] . '</td>
		<td class="time">
			<input id="setTimeExample" type="text" class="time ui-timepicker-input" autocomplete="off">
		</td>
		<td class="time">
			<input id="setTimeExample2" type="text" class="time ui-timepicker-input" autocomplete="off">
		</td>
		<td>' . $row['Servico'] . '</td>
		<td><input type="checkbox" value="' . $row['id'] . '"></td>
	  </tr>';
	}
	closeConection($con);
}