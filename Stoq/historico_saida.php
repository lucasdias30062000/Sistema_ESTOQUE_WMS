<?php
$titulo = 'STOQ4U';
require_once 'header.php';
require_once 'conection.php';
?>

<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Historico de Saidas
		</div>
		<div class="conteudo">
			<div class="item">
				
				<a class='btn btn-outline-primary' style=" right: 590px; top: 100px; font-family:'calibri';" href='saida.php'>Voltar</a><br><br>

				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID Saida</th>
				      <th scope="col">ID Produto</th>
				      <th scope="col">Quantidade Retirada</th>
				      <th scope="col">Data</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$stmt = $conn->prepare("SELECT * FROM tbdordemsaida");

							
						$stmt->execute();

						$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				  		foreach($results as $row => $value){

								echo "<tr>";
                                echo "<td>" . $value['id_OrdemSaida'] . "</td>";
								echo "<td>" . $value['id_Produto'] . "</td>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
								echo "<td>" . $value['dt_OrdemSaida'] . "</td>";
								echo "<tr>";
							}
				  	?>
				  		

				  </tbody>
				</table>

			</div>
		</div>
	</div>
</main>

<?php
include 'footer.php';
?>