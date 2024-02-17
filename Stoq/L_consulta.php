<?php
	$titulo = 'STOQ';
	require_once 'header.php';
	require_once 'conection.php';
?>	
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Consulta de Produtos
		</div>
		<div class="conteudo">
			<div class="item">

				<form method="POST" action="">
				<input class="form-control" type="search" style="position: absolute; width: 150px; top: 100px; font-family:'calibri';" name="result" placeholder="ID ou Codigo do Produto"><br><br>
				<button class="btn btn-outline-primary" type="submit" style="position: absolute; right: 590px; top: 100px; font-family:'calibri';" >Buscar</button>
				</form>

				<table class="table">
				  <thead>
				    <tr>
					  <th scope="col">ID</th>
				      <th scope="col">Nome</th>
					  <th scope="col">Valor Unitario</th>	
				      <th scope="col">Descrição</th>
					  <th scope="col">Comprimento</th>
					  <th scope="col">Altura</th>
					  <th scope="col">Largura</th>
				      <th scope="col">Quantidade</th>
				      <th scope="col">...</th>
				    </tr>
				  </thead>
				  <tbody>
				  	
				  		<?php  

				  			$pesquisa = $_POST['result'];
				  			if($pesquisa != NULL){
							$stmt = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = $pesquisa ");
							}else{
								$stmt = $conn->prepare("SELECT * FROM tbdcadprod");
							}
							
							$stmt->execute();

							$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

							foreach($results as $row => $value){

								echo "<tr>";
								echo "<td>" . $value['id_Produto'] . "</td>";
								echo "<td>" . $value['nm_Produto'] . "</td>";
								echo "<td>" . $value['vl_Valor'] . "</td>";
								echo "<td>" . $value['ds_Produto'] . "</td>";
								echo "<td>" . $value['comp_Produto'] . "</td>";
								echo "<td>" . $value['alt_Produto'] . "</td>";
								echo "<td>" . $value['larg_Produto'] . "</td>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
							}
						?>
				  </tbody>
				</table>				

			</div>
		</div>
	</div>
</main>

