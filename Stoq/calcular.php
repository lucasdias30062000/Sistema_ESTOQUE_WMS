<?php
require_once 'conection.php';

if (isset($_POST['calcular'])) {
    $quantidade = $_POST['quantidade'];
    $produto_id = $_POST['id_produto'];


    if (isset($_POST['volume_Produto']) && $_POST['volume_Produto'] !== null) {
        $volumeProdutoCubo = $_POST['volume_Produto']; 
        // Consulta SQL e execução
        $sql = ("INSERT INTO tbdcadprod (volume_Produto) VALUES ($produtoVolumeCubo)");

        $stmt = $conn->prepare($sql);
       
        if ($stmt->execute()) {
            // Dados inseridos com sucesso
            header("Location: update_entrada.php");
        } else {
            // Lidar com erros da consulta
            echo "Erro ao salvar os dados no banco de dados.";
        }
    } else {
        echo "O campo 'volume_Produto' não foi fornecido ou é nulo.";
    
    }
}


?>