<?php

   require_once 'conection.php';

    $nm = $_POST['nm'];
    $vl = $_POST['vl'];
    $desc= $_POST['desc'];
    $comp = $_POST['comp'];
    $alt = $_POST['alt'];
    $larg = $_POST['larg'];    
    $volume = $comp*$alt*$larg;
    $stmt = $conn->prepare("INSERT INTO  tbdcadprod (nm_Produto, vl_Valor, ds_Produto, comp_Produto, alt_Produto, larg_Produto, volume_Produto) VALUES (?,?,?,?,?,?,?)"); 

    $novo_produto = array($nm, $vl, $desc, $comp, $alt, $larg, $volume);

    if ($stmt->execute($novo_produto)){
        header("Location: cadastro.php");
      }


    
?>
