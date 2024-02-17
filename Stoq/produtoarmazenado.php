<?php
	$titulo = 'STOQ';
	require_once 'header.php';
	require_once 'conection.php';
?>	
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Produtos Armazenados
		</div>
		<div class="conteudo">
			<div class="item">

				<form method="POST" action="L_consulta.php">	
					<input class="form-control" type="search" style="position: absolute; width: 150px; top: 100px; font-family:'calibri';" name="result" placeholder="Nome Produto"><br><br>
					<button class="btn btn-outline-primary" type="submit" style="position: absolute; right: 590px; top: 100px; font-family:'calibri';" >Buscar</button>
				</form>
					
				<table class="table">
				  <thead>
				    <tr>
					  <th scope="col">ID</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Quantidade</th>
					  <th scope="col">Armazem</th>
					  <th scope="col">Rua</th>
					  <th scope="col">Baia</th>
					  <th scope="col">Nível</th>
					  <th scope="col">Vão</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
						$entrada = $conn->prepare("SELECT * FROM tbdordementrada");
						$entrada->execute();
						$results1 = $entrada->fetchAll(PDO::FETCH_ASSOC);
						$idproduto = $results2['id_Produto'];
						$idlocalizacao = $results2['id_armazem'];

				  		$stmt = $conn->prepare("SELECT id_Produto, nm_Produto FROM tbdcadprod WHERE id_Produto = $idproduto");		
						$stmt->execute();
						$results2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

						$localizacao = $conn->prepare("SELECT nm_armazem, rua_armazem, baia_armazem, nv_armazem, vao_armazem FROM tbdcadloc WHERE id_armazem = $idlocalizacao");
						$localizacao->execute();
						$results3 = $localizacao->fetchAll(PDO::FETCH_ASSOC);
						
						
						

				  		foreach($results2 as $value){
								echo "<tr>";
								echo "<td>" . $value['id_Produto'] . "</td>";
								echo "<td>" . $value['nm_Produto'] . "</td>";
							}
							foreach($results1 as $value){
								echo "<tr>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
							}

							foreach($results3 as $entrada){
								echo "<tr>";
								echo "<td>" . $entrada['nm_armazem'] . "</td>";
								echo "<td>" . $entrada['rua_armazem'] . "</td>";
								echo "<td>" . $entrada['baia_armazem'] . "</td>";
								echo "<td>" . $entrada['nv_armazem'] . "</td>";
								echo "<td>" . $entrada['vao_armazem'] . "</td>";
							}
				  	?>
				  </tbody>
				</table>				

			</div>
		</div>
	</div>
</main>
