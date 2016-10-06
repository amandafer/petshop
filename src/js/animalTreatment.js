function padTime(time) {
	while (time.toString().length < 2) {
		time = '0' + time;
	}
	
	return time;
}

	function animalTreatment() {
		$('#setTimeExample').live('click', function (){
		  var checkin = new Date();
		
		  $('#setTimeExample').val(padTime(checkin.getHours()) + ':' + padTime(checkin.getMinutes()));
		});
		
		$('#setTimeExample2').live('click', function (){
		  var checkout = new Date();
		
		  $('#setTimeExample2').val(padTime(checkout.getHours()) + ':' + padTime(checkout.getMinutes()));
		});
		
		$('#btFinalizar').click(function (event) {
			event.preventDefault();
			if ($('#animalTreatment :checked').size()) {
				$.post('updateService.php', {
					checkin: $('#setTimeExample').val(),
					checkout: $('#setTimeExample2').val(),
					id: $('#animalTreatment :checked').val()
				}, function (data) {
					if (data.success) {
						loadGrid();
					} else {
						alert('Ocorreu um erro ao finalizar o servico.');
					}
				}, 'json');
			} else {
				alert('Marque pelo menos um dos servicos.');
			}
		});
		if (typeof CPF !== 'undefined') {
			loadGrid();
		}
	}
	
	function loadGrid() {
		$.post('grid.php', { cpf: CPF }, function (data) {
			if (typeof data === 'string') {
				$('#animalTreatment table tbody').html(data);
			}
		}, 'html');
	}