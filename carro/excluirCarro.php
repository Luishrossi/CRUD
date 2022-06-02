<?php 

    include '../conexao.php';
    
    $codigo = $_GET['id_carro'];

    $sql = "DELETE FROM carro WHERE id_carro = $codigo";

    if (mysqli_query($conexao, $sql) == false) {
        die("erro: ". mysqli_error($conexao));
    } else {
        header("location: ./listaCarro.php");
    }
    
?>