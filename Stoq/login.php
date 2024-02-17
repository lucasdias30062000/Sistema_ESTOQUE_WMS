<?php
    session_start();
    require_once 'conection.php';


    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: index.php');
        exit();
    }


    $usuario = mysqli_real_escape_string($conection, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conection, $_POST['senha']);

    $query = ("SELECT id_usuario, usuario FROM usuario WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')");
    
    $result = mysqli_query($conection, $query);

    $row = mysqli_num_rows($result);

    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: cadastro.php');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
?>  