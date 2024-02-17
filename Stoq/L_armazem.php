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

				<form method="POST" action="">
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
				    </tr>
				  </thead>
				  <tbody>
				  	
				  		<?php  
				  			$pesquisa = $_POST['result'];
							if($pesquisa != NULL){
								$stmt = $conn->prepare("SELECT * FROM tbdcadloc WHERE id_armazem = $pesquisa OR nm_armazem = $pesquisa");
							}else{
								$stmt = $conn->prepare("SELECT * FROM tbdcadloc");
							}
						
							$stmt->execute();

							$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				  		foreach($results as $row => $value){

								echo "<tr>";
								echo "<td>" . $value['id_armazem'] . "</td>";
								echo "<td>" . $value['nm_armazem'] . "</td>";
								echo "<td>" . $value['rua_armazem'] . "</td>";
								echo "<td>" . $value['baia_armazem'] . "</td>";
								echo "<td>" . $value['nv_armazem'] . "</td>";
                                echo "<td>" . $value['vao_armazem'] . "</td>";
								echo "<td>" . $value['comp_armazem'] . "</td>";
								echo "<td>" . $value['alt_armazem'] . "</td>";
								echo "<td>" . $value['larg_armazem'] . "</td>";													
						}

					?>
			  </tbody>
			</table>				

		</div>
	</div>
</div>
</main>
