<?php 
    include '../conexao.php';

    $nmPet = $_POST['nm_pet'];
    $cdDono = $_POST['cd_dono'];

    if (isset($_GET['cd_pet'])){
        $sql = "UPDATE pet 
                    SET nm_pet = '$nmPet, cd_dono = $cdDono 
                    WHERE cd_pet = $_POST[cd_pet]";
    } else {
        $sql = "INSERT INTO pet (nm_pet, cd_dono) 
                    VALUES ('$nmPet', $cdDono)";
    }

    

    mysqli_query($conexao, $sql);

    header("location: ./listaPet.php");


?>