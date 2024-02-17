<?php
$titulo = 'STOQ';
require_once 'header.php';
require_once 'conection.php';
?>
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Saida de Produtos 
		</div>
		<div class="conteudo">
			<div class="item">

				<a class='btn btn-outline-primary' style=" right: 590px; top: 100px; font-family:'calibri';" href='historico_saida.php'>Historico de Saidas</a><br><br>

				<table class="table">
				  <thead>
				    <tr>
					<th scope="col">ID</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Descrição</th>
					  <th scope="col">Comprimento</th>
					  <th scope="col">Altura</th>
					  <th scope="col">Largura</th>
				      <th scope="col">Quantidade</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$stmt = $conn->prepare("SELECT * FROM tbdcadprod");
						$stmt->execute();
						$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				  		foreach($results as $row => $value){
								echo "<tr>";
								echo "<td>" . $value['id_Produto'] . "</td>";
								echo "<td>" . $value['nm_Produto'] . "</td>";
								echo "<td>" . $value['ds_Produto'] . "</td>";
								echo "<td>" . $value['comp_Produto'] . "</td>";
								echo "<td>" . $value['alt_Produto'] . "</td>";
								echo "<td>" . $value['larg_Produto'] . "</td>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
								echo "<td><a class='btn btn-sm btn-danger' href='update_saida.php?id=$value[id_Produto]'>-</a></td>";
								echo "<tr>";
							}
				  	?>
				  </tbody>
				</table>

			</div>
		</div>
	</div>
</main>