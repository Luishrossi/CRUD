<?php 

    include '../conexao.php';
    

    $codigo = $_GET['id_produto'];

   
    $sql = "DELETE FROM produto WHERE id_produto = $codigo";

    if (mysqli_query($conexao, $sql) == false) {
        die("erro: ". mysqli_error($conexao));
    } else {
        header("location: ./listaProduto.php");
    }
?>