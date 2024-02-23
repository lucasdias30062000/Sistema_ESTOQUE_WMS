<?php
$titulo = 'STOQ4U';
require_once 'header.php';
require_once 'conection.php';
?>

<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Historico de Entradas
		</div>
		<div class="conteudo">
			<div class="item">
				
				<a class='btn btn-outline-primary' style=" right: 590px; top: 100px; font-family:'calibri';" href='entrada.php'>Voltar</a><br><br>

				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID Entrada</th>
				      <th scope="col">ID Produto</th>
				      <th scope="col">Quantidade Recebida</th>
				      <th scope="col">Data</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$stmt = $conn->prepare("SELECT * FROM tbdordementrada");

							
						$stmt->execute();

						$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				  		foreach($results as $row => $value){

								echo "<tr>";
                                echo "<td>" . $value['id_OrdemEntrada'] . "</td>";
								echo "<td>" . $value['id_Produto'] . "</td>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
								echo "<td>" . $value['dt_Atualizacao'] . "</td>";
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
