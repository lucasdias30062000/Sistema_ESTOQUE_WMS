<?php

   require_once 'conection.php';

    $am = $_POST['am'];
    $rua = $_POST['rua'];
    $baia = $_POST['baia'];
    $nv = $_POST['nv'];
    $vao = $_POST['vao'];
    $comp = $_POST['comp'];
    $alt = $_POST['alt'];
    $larg = $_POST['larg'];
    $volume = ($comp*$alt*$larg);
       

    $stmt = $conn->prepare("INSERT INTO  tbdcadloc (nm_armazem, rua_armazem, baia_armazem, nv_armazem, vao_armazem, comp_armazem, alt_armazem, larg_armazem, volume_armazem) VALUES (?,?,?,?,?,?,?,?,?)"); 

    $novo_localizacao = array($am, $rua, $baia, $nv, $vao, $comp, $alt, $larg,$volume);

    if ($stmt->execute($novo_localizacao)){
        header("Location: localização.php");
      }


    
?>
