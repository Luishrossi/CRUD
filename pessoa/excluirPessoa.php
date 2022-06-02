<?php 

    include '../conexao.php';
    

    $codigo = $_GET['cd_pessoa'];

   
    $sql = "DELETE FROM pessoa WHERE cd_pessoa = $codigo";

    if (mysqli_query($conexao, $sql) == false) {
        die("erro: ". mysqli_error($conexao));
    } else {
        header("location: ./listaPessoa.php");
    }
?>