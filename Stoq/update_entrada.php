<?php
require_once 'header.php';
require_once 'conection.php';

// Função para obter localizações disponíveis com detalhes
function getLocalizacoesDisponiveisComDetalhes($conn, $produto_id) {

    $stmtProduto = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = :id_produto");
    $stmtProduto->bindParam(':id_produto', $produto_id);
    $stmtProduto->execute();
    $produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);
    $altp = $produto['alt_Produto'];
    $largp = $produto['larg_Produto'];
    $compp = $produto['comp_Produto'];

    if ($produto) {
        $produtoVolumecubo = $produto['volume_Produto'];
        $stmtLocalizacoes = $conn->prepare("SELECT * FROM tbdcadloc");
        $stmtLocalizacoes->execute();
        $localizacoes = $stmtLocalizacoes->fetchAll(PDO::FETCH_ASSOC);

        $localizacoesDisponiveis = [];
        $localizacaovolume = [];
        $idArmazemMenorVolume = [];
        $iddalocalizacao = [];
        $alt = [];
        $larg = [];
        $comp = [];

        //Verifica se o produto é menor ou igual as localizações se for ele testa as dimensoes de comprimento, altura,largura.
        // Se essas dimensões do Produto forem menor que da localização ele armazena as informações de cada localizacao
        // Para mais em baixo Pegarmos o menor volume e encontrar a localização que pertence a esse menor volume
        // Pois já encontramos no primeiro loop as localizações que tem dimensões para armazenar esse Produto
        foreach ($localizacoes as $localizacao) {
            $localizacaoaltura = $localizacao['alt_armazem'];
            $localizacaolargura = $localizacao['larg_armazem'];
            $localizacaocomprimento = $localizacao['comp_armazem'];
            $Volume = $localizacao['volume_armazem'];
            if ($produtoVolumecubo <= $Volume) { 
                $teste = $localizacao['id_armazem'];
                if (($altp <= $localizacaoaltura) and ($largp <= $localizacaolargura) and ($compp <= $localizacaocomprimento)){ 
                    $iddalocalizacao[] = $localizacao['id_armazem'];
                    $alt[] = $localizacao['alt_armazem'];
                    $larg[] = $localizacao['larg_armazem'];
                    $comp[] = $localizacao['comp_armazem'];
                    $localizacaovolume[] = $localizacao['volume_armazem'];
                }
                }           
            }
            
                    if(!empty($localizacaovolume)){
                        //Array de volume       
                        $meuArray = $localizacaovolume;
                        sort($meuArray);
                        $locs = $meuArray[0];
                        //echo "$locs";
                    }
           
                    if(!empty($locs)){
                    //Verifica a localização que pertence ao volume
                    foreach ($localizacoes as $localizacao) {
                        if(($localizacao['volume_armazem'] == $locs)){
                            $localizacaoaltura = $localizacao['alt_armazem'];
                            $localizacaolargura = $localizacao['larg_armazem'];
                            $localizacaocomprimento = $localizacao['comp_armazem'];  
                            if (($altp <= $localizacaoaltura) and ($largp <= $localizacaolargura) and ($compp <= $localizacaocomprimento)){                 
                            $idArmazemMenorVolume = $localizacao['id_armazem'];
                            }
                      }
                    }     
                  }     
        $localizacoesDisponiveis = $idArmazemMenorVolume;
        return $localizacoesDisponiveis;
    } else {
        return [];
    }
}       
?>
<!-- Conteúdo -->
<main class="col-sm-9">
    <div class="principal">
        <div class="titulo">
            Entrada de Produtos
        </div>
        <div class="conteudo">
            <div class="item">
                <a class='btn btn-outline-primary' type="submit" style="right: 590px; top: 100px; font-family:'calibri';" href='entrada.php'>Voltar</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>                            
                            <th scope="col">Produto</th>                                                       
                            <th scope="col">Comprimento</th>
                            <th scope="col">Altura</th>
                            <th scope="col">Largura</th>
                            <th scope="col">Volume</th>
                        </tr>                      
                    
                    <tbody>
                    <?php
        
                    if (isset($_GET['id'])) {
                        $produto_id = $_GET['id'];
                        $stmt = $conn->prepare("SELECT * FROM tbdcadprod WHERE id_Produto = :id_produto");
                        $stmt->bindParam(':id_produto', $produto_id);
                        $stmt->execute();
                        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                        // Loop de produtos
                        foreach ($produtos as $produto) {                                                                                                                                                                                                                                        
                            echo "<tr>";       
                            echo "<td>" . $produto['id_Produto'] . "</td>"; 
                            echo "<td>" . $produto['nm_Produto'] . "</td>";                                                                           
                            echo "<td>" . $produto['comp_Produto'] . "</td>";
                            echo "<td>" . $produto['alt_Produto'] . "</td>";
                            echo "<td>" . $produto['larg_Produto'] . "</td>"; 
                            echo "<td>" . $produto['volume_Produto'] . "</td>";                        
                        }
                        $localizacoesDisponiveis = getLocalizacoesDisponiveisComDetalhes($conn, $produto_id);
                        if(!empty($localizacoesDisponiveis)){
                        //echo $localizacoesDisponiveis; TESTE DE ID
                        echo "<td>   
                        <form method='POST'action='L_entrada.php'>
                              <input type='hidden' name='id' value=".$produto['id_Produto']."'>
                              <input type='hidden' name='qtd' value=".$produto['qtd_Produto']."'>
                              <input type='hidden' name='idloc' value=".$localizacoesDisponiveis."'>
                              <input class='form-control' type='number' style=' width: 80px;' font-family:'calibri';' name='result' required>
									</td>
									<td>
									<button class='btn btn-sm btn-primary' style='margin-top: 3px; margin-left: -10px; margin-right: 200px;' type='submit' onclick='alert('Produto cadastrado com sucesso')''>+</button>
									</td>
									</form>
								</td> ";
								echo "<tr>";
                            }
                                ?>
                                </tbody>  
                                <?php                                    
                    $localizacoesDisponiveis = getLocalizacoesDisponiveisComDetalhes($conn, $produto_id);
                    
                    if (!empty($localizacoesDisponiveis)) {
                        echo "<tr>";
                        echo "<th scope='col' colspan='5'>Os Produtos serão Armazenados em:</th>";
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
                    <?php    
                          $localizacoesDisponiveis = getLocalizacoesDisponiveisComDetalhes($conn, $produto_id);
                          if (!empty($localizacoesDisponiveis)) {
                            $selec = $conn->prepare("SELECT id_armazem, nm_armazem, rua_armazem, baia_armazem, nv_armazem, vao_armazem, comp_armazem, alt_armazem, larg_armazem, volume_armazem FROM tbdcadloc WHERE id_armazem = :alocar");
                            $selec->bindParam(':alocar', $alocar);
                            $alocar = $localizacoesDisponiveis;
                            $selec->execute();
                            $selecs = $selec->fetchAll(PDO::FETCH_ASSOC);
                        foreach($selecs as $armazenar){
                            echo "</tr>";                          
                            echo "<td>" . $armazenar['id_armazem'] . "</td>";
                            echo "<td>" . $armazenar['nm_armazem'] . "</td>";                                                        
                            echo "<td>" . $armazenar['rua_armazem'] . "</td>";
                            echo "<td>" . $armazenar['baia_armazem'] . "</td>";
                            echo "<td>" . $armazenar['nv_armazem'] . "</td>";
                            echo "<td>" . $armazenar['vao_armazem'] . "</td>";
                            echo "<td>" . $armazenar['volume_armazem'] . "</td>";
                          }}        
                     else {
                        echo "<tr>";
                        echo "<tr>";
                        echo "<h1 scope='col' font-size:200px >Não possuem Localizações Disponiveis para esse produto no momento.</h1>";
                        echo "<td>";
                        echo "</tr>";
                        echo "</tr>";
                        }                                                                                                
                    ?>
                    </tbody>
                    </thead>
                    </table>
            </div>
        </div>
    </div>
</main>