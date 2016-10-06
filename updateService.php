<?php

if (isset($_POST['id'])) { 

	include 'conexao.php';

	$checkin = date('Y-m-d') . ' ' . $_POST['checkin'] . ':00';
	$checkout = date('Y-m-d') . ' ' . $_POST['checkout'] . ':00';
	
	$sql = sprintf("UPDATE atendimentoservico SET DataHoraEntrada='%s', DataHoraSaida='%s' WHERE id = %d", $checkin, $checkout, $_POST['id']);
	
	$result = mysqli_query($con, $sql);
	
	if ($result) {
		echo json_encode(array(
			'success' => true
		));
	} else {
		echo json_encode(array(
			'success' => true
		));
	}
}

exit();