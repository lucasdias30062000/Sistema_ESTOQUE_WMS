<?php
	$titulo = 'STOQ';
	require_once 'header.php';
	require_once 'conection.php';

	function getlocalizacaoexcluir($conn, $produto_id){
	$stmtProduto = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = :id_produto");
    $stmtProduto->bindParam(':id_produto', $produto_id);
    $stmtProduto->execute();
    $produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);
	$trata = $produto['id_Produto'];

	if($produto){			
		//echo "$trata";
		$localizacao = [];
		$quantidade = [];
		$i = 0;
		$retirar = [];
		$retirar2 = [];
			$idordem = $conn->prepare("SELECT id_OrdemEntrada, qtd_Produto FROM tbdordementrada WHERE id_Produto = $trata");
			$idordem->execute();
			$idordemretornado = $idordem->fetchAll(PDO::FETCH_ASSOC);

			foreach($idordemretornado as $retorna){		
				$quantidade = $retorna['qtd_Produto'];
				if($quantidade > 0){
					$retirar[] = $retorna['id_OrdemEntrada'];
					$retirar2[] = $retorna['qtd_Produto'];
				}
		   }

		   if(!empty($retirar)){
			$meuArray = $retirar;
			sort($meuArray);
			$saida = $meuArray[0];
			$localizacaoexcluir = $saida;
			$meuArray2 = $retirar2;
			sort($meuArray2);
			$saida2 = $meuArray2[0];
			echo "$localizacaoexcluir";
			
			return $localizacaoexcluir;
			} else 
				return [];
	}
}

?>
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Saída de Produtos
		</div>
		<div class="conteudo">
			<div class="item">									 
				<a class='btn btn-outline-primary' type="submit" style=" right: 590px; top: 100px; font-family:'calibri';" href='saida.php'>Voltar</a>

				<table class="table">
				  <thead>
				    <tr>
					<th scope="col">ID</th>
				      <th scope="col">Nome</th>
					  <th scope="col">Comprimento</th>
					  <th scope="col">Altura</th>
					  <th scope="col">Largura</th>
				      <th scope="col">Quantidade</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php  

							if (isset($_GET['id'])) {
								$produto_id = $_GET['id'];
								$stmt = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = :id_produto");
								$stmt->bindParam(':id_produto', $produto_id);
								$stmt->execute();
								$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
							}

							foreach($produtos as $produto){
								echo "<tr>";
								echo "<td>" . $produto['id_Produto'] . "</td>";
								echo "<td>" . $produto['nm_Produto'] . "</td>";
								echo "<td>" . $produto['comp_Produto'] . "</td>";
								echo "<td>" . $produto['alt_Produto'] . "</td>";
								echo "<td>" . $produto['larg_Produto'] . "</td>";
								echo "<td>" . $produto['qtd_Produto'] . "</td>";
							}
							$localizacaoexcluir = getlocalizacaoexcluir($conn, $produto_id);
							if(!empty($localizacaoexcluir)){
								//echo $localizacaoexcluir; //TESTE DE ID
								echo "<td>  
                                        <form method='POST'action='L_Saida.php'>
                                        <input type='hidden' name='id' value=".$produto['id_Produto']."'>
                                        <input type='hidden' name='qtd' value=".$produto['qtd_Produto']."'>
										<input type='hidden' name='idloc' value=".$localizacaoexcluir."'>
                                        <input class='form-control' type='number' style=' width: 210px; top: 100px; font-family:'calibri';' name='result'>
                                    <td>
									    <button class='btn btn-sm btn-danger' type='submit''>-</button>
									</td>									
									</form>
								</td> ";
								$idencontrado = $produto['id_Produto'];								
								$tratativa = intval($idencontrado);
								//echo "$tratativa";
								$qtdproduto = $produto['qtd_Produto'];
								$tratativa2 = intval($qtdproduto);
								//echo "$tratativa2";
								echo "<tr>";
							}
						?>
						</tbody>  
						<?php                                    
                    $localizacaoexcluir = getLocalizacaoexcluir($conn, $produto_id);
                    
                    if (!empty($localizacaoexcluir)) {
                        echo "<tr>";
                        echo "<th scope='col' colspan='5'>Os Produtos serão Retirados em:</th>";
                        echo "<td>";
                        echo "</tr>";
                        } 
                        ?>
                    <th scope="col">ID</th>
                        <th scope="col">Armazem</th> 
                        <th scope="col">Rua</th>
                        <th scope="col">Baia</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Vão</th> 
                        <th scope="col">Volume</th> 
                        <tr></tr>
                    <?php  
					$array = [];
					$localizacaoexcluir = getlocalizacaoexcluir($conn, $produto_id);
					if(!empty($localizacaoexcluir)){
						$idarmazem = $conn->prepare("SELECT id_armazem FROM tbdordementrada WHERE id_OrdemEntrada = $localizacaoexcluir");
						$idarmazem->execute();
						$idarmazemretornado = $idarmazem->fetchAll(PDO::FETCH_ASSOC);			
						foreach($idarmazemretornado as $retorna){	
							$array[] = $retorna['id_armazem'];					                         
					   }
					  		$ordenar = $array;
							sort($ordenar);
							$primeiroalocado = $ordenar[0];
							$locs = $primeiroalocado;
							//echo "$locs";
					$selec = $conn->prepare("SELECT id_armazem, nm_armazem, rua_armazem, baia_armazem, nv_armazem, vao_armazem, volume_armazem FROM tbdcadloc WHERE id_armazem = $locs");
                    $selec->execute();
                    $selecs = $selec->fetchAll(PDO::FETCH_ASSOC);
                        foreach($selecs as $armazenar){
                            echo "<tr>";                           
                            echo "<td>" . $armazenar['id_armazem'] . "</td>";
                            echo "<td>" . $armazenar['nm_armazem'] . "</td>";                                                        
                            echo "<td>" . $armazenar['rua_armazem'] . "</td>";
                            echo "<td>" . $armazenar['baia_armazem'] . "</td>";
                            echo "<td>" . $armazenar['nv_armazem'] . "</td>";
                            echo "<td>" . $armazenar['vao_armazem'] . "</td>";
                            echo "<td>" . $armazenar['volume_armazem'] . "</td>";
                          }
						if($tratativa2 <= 0 || $tratativa2 = null) { 
									echo "<tr>";
									echo "<tr>";
									echo "<tr>";
									echo "<h1 scope='col' font-size:200px >Esse Produto ainda não foi armazenado.</h1>";
									echo "<td>";
									echo "</tr>";
									echo "</tr>";
								}   
							} else {
								echo "<tr>";
								echo "<tr>";
								echo "<tr>";
								echo "<h1 scope='col' font-size:200px >Esse Produto ainda não foi armazenado.</h1>";
								echo "<td>";
								echo "</tr>";
								echo "</tr>";
							}
						  ?>
				  </tbody>
				</table>	
			</div>
		</div>
	</div>
</main>