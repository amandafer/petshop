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
			   END AS Tipo
		FROM  pet P
		WHERE CPF = '" . $SessaoCPF . "';";
				
$result = mysqli_query($con,$sql);
?>

<h1>Pets</h1>
<div id="pets">
	<table class="table table-striped">
		<thead>
		  <tr>
			<th>#</th>
			<th>Pet Name</th>
			<th>Raça</th>
			<th>Idade</th>
			<th>Animal</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		while($row = mysqli_fetch_array($result))
		{
		?>
		  <tr>
			<td><?php echo $row['IdPet'];?></td>
			<td><?php echo $row['Nome'];?></td>
			<td><?php echo $row['Raca'];?></td>
			<td><?php echo $row['Idade'] . " Anos";?></td>
			<td><?php echo $row['Tipo'];?></td>
		  </tr>
		<?php
		}
			closeConection($con);
		?>
		</tbody>
	</table>
</div>
<a href="#registerPet" data-toggle="modal"><button class="btn btn-primary addPet">Adicionar</button></a>

<div id="registerPet" class="modal hide fade">
	<form action="registerPet.php" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Registre seu Animal</h3>
		</div>
		<div class="modal-body">
			<div class="form">
				<table border="0">
					<tbody>
						<tr class="even">
							<th><label class="required">Nome</label><div></div></th>
							<td><input type="text" class="span4" name="Nome" required="required"></td>
						</tr>
						<tr class="even">
							<th><label class="required">Raça</label><div></div></th>
							<td><input type="text" class="span4" name="Raca" required="required"></td>
						</tr>
						<tr class="even">
							<th><label class=" required">Data de Nascimento</label><div></div></th>
							<td>
								<input type="text" class="span1" name="Mes" required="required" placeholder="Mês">
								<input type="text" class="span1" name="Ano" required="required" placeholder="Ano">
							</td>
						</tr>
						<tr class="even">
							<th><label class=" required">Tipo</label><div></div></th>
							<td>
								<div id="projectCombo" class="input-append dropdown combobox">
									<input class="span2" type="text" name="Tipo" value="Selecione o animal..." readonly="" data-value="1">
									<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>	       
									<ul class="dropdown-menu">
										<li><a href="#" data-value="1">Cachorro</a></li>
										<li><a href="#" data-value="0">Gato</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary" type="submit">Register</button>
		</div>
	</form>
</div>