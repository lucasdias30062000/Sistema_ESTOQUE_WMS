<?php
require_once 'conection.php';
    $id = (int)$_POST['id'];
    $qtd = (int)$_POST['qtd'];
    $qtdE = (int)$_POST['result'];
    $Nqtd = (int)$qtd-$qtdE;
    $id_localizacao = (int)$_POST['idloc'];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d/m/Y H:i:s', time());

    $stmt = $conn->prepare("UPDATE tbdcadprod SET qtd_Produto = $Nqtd WHERE id_Produto = $id");

    if ($Nqtd >= 0){
        $hist = $conn->prepare("INSERT INTO tbdordemsaida (id_Produto, qtd_Produto) VALUES ($id,$qtdE) ");
        $delete = $conn->prepare("UPDATE tbdordementrada SET qtd_Produto = $Nqtd WHERE id_OrdemEntrada = $id_localizacao ");
        $hist->execute();
        $stmt->execute();
        $delete->execute();
        header("Location: saida.php");
        
    }else{
        echo  "<script>alert('Itens insuficientes para retirada!');</script>";
        header("Location: saida.php");
        
    }   	

?>
