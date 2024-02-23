<?php

require_once 'conection.php';

if (isset($_POST['salvar'])) {
    $produto_id = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];
    $localizacao = $_POST['localizacao'];

    // Execute os comandos SQL para inserir ou atualizar os dados no banco de dados
    $stmt = $conn->prepare("INSERT INTO tbdcadprod (idloc_Produto, qtdloc_Produto, loc_Produto) VALUES (:produto_id, :quantidade, :localizacao)");
    $stmt->bindParam(':produto_id', $produto_id);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':localizacao', $localizacao);

    if ($stmt->execute()) {
        // Os dados foram salvos com sucesso
        header("Location: entrada.php");
    } else {
        // Algo deu errado, você pode lidar com o erro aqui
        echo "Erro ao salvar os dados no banco de dados.";
    }
}
?>
