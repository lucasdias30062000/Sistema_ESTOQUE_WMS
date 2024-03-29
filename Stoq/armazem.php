<?php
	$titulo = 'STOQ';
	require_once 'header.php';
	require_once 'conection.php';
?>
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Localização
		</div>
		<div class="conteudo">
			<div class="item">

				<form method="POST" action="L_armazem.php">	
					<input class="form-control" type="search" style="position: absolute; width: 150px; top: 100px; font-family:'calibri';" name="result" placeholder="ID Armazem"><br><br>
					<button class="btn btn-outline-primary" type="submit" style="position: absolute; right: 590px; top: 100px; font-family:'calibri';" >Buscar</button>
				</form>
					
				<table class="table">
				  <thead>
				    <tr>
                    <th scope="col">id</th>
				      <th scope="col">Armazem</th>
				      <th scope="col">Rua</th>
				      <th scope="col">Baia</th>
				      <th scope="col">Nível</th>
				      <th scope="col">Vão</th>
                      <th scope="col">Comprimento</th>
					  <th scope="col">Altura</th>
					  <th scope="col">Largura</th>
					  <th scope="col">Volume</th>
				      <th scope="col">...</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$stmt = $conn->prepare("SELECT * FROM tbdcadloc");
						$stmt->execute();
						$locs = $stmt->fetchAll(PDO::FETCH_ASSOC);

				  		foreach($locs as $loc){
								echo "<tr>";
								echo "<td>" . $loc['id_armazem'] . "</td>";
								echo "<td>" . $loc['nm_armazem'] . "</td>";
								echo "<td>" . $loc['rua_armazem'] . "</td>";
								echo "<td>" . $loc['baia_armazem'] . "</td>";
								echo "<td>" . $loc['nv_armazem'] . "</td>";
                                echo "<td>" . $loc['vao_armazem'] . "</td>";
								echo "<td>" . $loc['comp_armazem'] . "</td>";
								echo "<td>" . $loc['alt_armazem'] . "</td>";
								echo "<td>" . $loc['larg_armazem'] . "</td>";
								echo "<td>" . $loc['volume_armazem'] . "</td>";																
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
