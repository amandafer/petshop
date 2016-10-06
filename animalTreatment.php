<?php session_start(); ?>
<body>
	<script>
		var CPF = '<?= $_SESSION['cpf']; ?>';
		
		$(function () {
			animalTreatment();
		});
	</script>
	<h1>Animais</h1>
	<div id="animalTreatment">
		<table class="table table-striped">
			<thead>
			  <tr>
				<th>#</th>
				<th>Nome do Pet</th>
				<th>Cliente</th>
				<th>Início</th>
				<th>Término</th>
				<th>Serviço</th>
			  </tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>
		<button class="btn" type="button">Adicionar</button>
		<form method="post">
			<button class="btn btn-primary" type="button" name="Finalizar" id="btFinalizar" >Finalizar</button>
		</form>
	</div>
</body>