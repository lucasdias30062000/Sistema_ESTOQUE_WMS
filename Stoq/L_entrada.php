<?php
	require_once 'header.php';
	require_once 'conection.php';
?>
<?php
require_once 'conection.php';

$id = (int)$_POST['id'];
$qtd = (int)$_POST['qtd'];
$qtdE = (int)$_POST['result'];
$Nqtd = (int)$qtd+$qtdE;
$id_localizacao = (int)$_POST['idloc'];
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y H:i:s', time());

$stmt = $conn->prepare("UPDATE tbdcadprod SET qtd_Produto = $Nqtd WHERE id_Produto = $id");

//Entrada de dados tdbordementrada
$hist = $conn->prepare("INSERT INTO  tbdordementrada (id_Produto, id_armazem, qtd_Produto) VALUES ($id,$id_localizacao,$qtdE)");
$hist->execute();
if ($stmt->execute()){
	header("Location: entrada.php");
}
?>
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Entrada de Produtos
		</div>
		<div class="conteudo">
			<div class="item">
				<form method="POST" action="">
				<input class="form-control" type="search" style="position: absolute; width: 210px; top: 100px; font-family:'calibri';" name="result" placeholder="ID ou Codigo do Produto"><br><br>
				<button class="btn btn-outline-primary" type="submit" style="position: absolute; right: 590px; top: 100px; font-family:'calibri';" >Buscar</button>
				<a class='btn btn-outline-primary' style=" right: 590px; top: 150px; font-family:'calibri';" href='historico_entrada.php'>Historico de Entradas</a><br><br>
				</form>
				<table class="table">
				  <thead>
				    <tr>					
				      <th scope="col">Nome</th>
				      <th scope="col">Quantidade</th>
				      <th scope="col">Localizacao</th>
				    </tr>
				  </thead>
				  <tbody>				  	
				  <?php  
				  			$pesquisa = $_POST['result'];		
							if($pesquisa != NULL){
								$stmt = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = '%$pesquisa%' OR nm_Produto = '%$pesquisa%' ");
							}else{
								$stmt = $conn->prepare("SELECT * FROM tbdcadprod");
							}
							$stmt->execute();

							$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

							foreach($results as $row => $value){

								echo "<tr>";
								echo "<td>" . $value['nm_Produto'] . "</td>";
								echo "<td>" . $value['qtd_Produto'] . "</td>";
								echo "<td>" . $value['id_armazem'] . "</td>"; 
								echo "<td>
									<!--<a class='btn btn-sm btn-primary' href='update_entrada.php?id=$value[id_Produto]'>
									<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
 									 <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
									</svg>
									</a>-->									
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

