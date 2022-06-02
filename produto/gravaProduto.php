<?php 

    include '../conexao.php';

    $nmProduto = $_POST['nome'];
    $precoProduto = $_POST['preco'];
    $cdComprador = $_POST['cd_comprador'];

    if (isset($_POST['id_produto'])) {
        $sql = "UPDATE produto SET nm_produto = '$nmProduto', 
        vl_preco = $precoProduto WHERE id_produto =  $_POST[id_produto]";
        
    } else {
        $sql =  "INSERT INTO produto (nm_produto, vl_preco, cd_comprador) 
        VALUES ('$nmProduto', $precoProduto, $cdComprador)"; 
    }

    
    mysqli_query($conexao, $sql);
        
    header("location: listaProduto.php");
    

?>

