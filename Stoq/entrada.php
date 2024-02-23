<?php
$titulo = 'STOQ';
require_once 'header.php';
require_once 'conection.php';
?>
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Entrada de Produtos
		</div>
		<div class="conteudo">
			<div class="item">

				<form method="POST" action="L_entrada.php">	
					<input class="form-control" type="search" style="position: absolute; width: 150px; top: 100px; font-family:'calibri';" name="result" placeholder="ID Produto"><br><br>
					<button onclick="searchData()" class="btn btn-outline-primary" type="submit" style="position: absolute; right: 590px; top: 100px; font-family:'calibri';" >Buscar</button>
				</form>
					
				<table class="table">
				  <thead>
				    <tr>
					  <th scope="col">ID</th>
				      <th scope="col">Nome</th>	
					  <th scope="col">Comprimento</th>
					  <th scope="col">Altura</th>
					  <th scope="col">Largura</th>
					  <th scope="col">Volume</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php

							$stmt = $conn->prepare("SELECT * FROM tbdcadprod");
							$stmt->execute();
							$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

							foreach($produtos as $produto){

								echo "<tr>";
								echo "<td>" . $produto['id_Produto'] . "</td>";
								echo "<td>" . $produto['nm_Produto'] . "</td>";
								echo "<td>" . $produto['comp_Produto'] . "</td>";
								echo "<td>" . $produto['alt_Produto'] . "</td>";
								echo "<td>" . $produto['larg_Produto'] . "</td>";
								echo "<td>" . $produto['volume_Produto'] . "</td>";
								echo "<td>									
										<a class='btn btn-sm btn-primary' href='update_entrada.php?id=$produto[id_Produto]'>+</a>									
								</td>";
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
