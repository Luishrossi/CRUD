<?php 

    include '../conexao.php';
    
    $codigo = $_GET['cd_pet'];
   
    $sql = "DELETE FROM pet WHERE cd_pet = $codigo";

    if (mysqli_query($conexao, $sql) == false) {
        die("erro: ". mysqli_error($conexao));
    } else {
        header("location: ./listaPet.php");
    }
?>