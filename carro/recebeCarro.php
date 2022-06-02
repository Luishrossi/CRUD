<?php 
    include '../conexao.php';

    $nmCarro = $_POST['nm_carro'];
    $anoCarro = $_POST['ano'];
    $cdProprietario = $_POST['cd_proprietario'];

    if (isset($_POST['id_carro'])){
        $sql = "UPDATE carro 
                    SET nm_carro = '$nmCarro', ano = $anoCarro 
                    WHERE id_caro = $_POST[id_carro]" ;
    } else {
        $sql = "INSERT INTO carro (nm_carro, ano, cd_proprietario)
                    VALUE ('$nmCarro', $anoCarro, $cdProprietario)";
    }

    mysqli_query($conexao, $sql);   
    header("location: ./listaCarro.php"); 


    

?>