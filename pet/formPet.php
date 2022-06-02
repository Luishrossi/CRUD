<?php 
    include '../conexao.php';
    $sql = "SELECT cd_pessoa, nm_pessoa FROM pessoa ORDER BY nm_pessoa";
    
    $resultadoPessoas = mysqli_query($conexao, $sql);

    if (isset($_GET['cd_pet'])){
        $sqlPet = "SELECT cd_pet, nm_pet, cd_dono FROM pet WHERE cd_pet = ". $_GET['cd_pet'];
        $resultadoPet = mysqli_query($conexao, $sqlPet);
        
        $pet = mysqli_fetch_array($resultadoPet);
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>

    <body>

        <div id="principal">
            <div id="menu">
                <h2>Cadastro Pet</h2>
                <a href="../index.html">Voltar a página inicial</a>

            </div>

            <div id="cadastro">
                <form method="post" action="./recebePet.php">

                <?php 
                    if (isset($_GET['cd_pet'])) {
                        echo "Código: ";
                        echo "<input type='text'
                        value='$_GET[cd_pet]'
                        readonly='readonly'> <br><br> ";
                    }    
                ?>
                Nome:
                <input type="text" name="nm_pet" value="<?php 
                        if(isset($pet['nm_pet'])){
                            echo $pet['nm_pet'];
                        }?>"><br><br>      
                Dono: 
                <select name="cd_dono">
                    <option value=""> - Selecione - </option>
                        <?php 
                            while ($linha = mysqli_fetch_array($resultadoPessoas)){
                                if ($linha['cd_pessoa'] == $pet['cd_dono']) {
                                    echo "<option selected value='$linha[cd_pessoa]'>";

                                } else {
                                    echo "<option value='$linha[cd_pessoa]'>";
                                }
                                echo $linha['nm_pessoa'];
                                echo "</option>";
                            }
                        ?>

                </select><br><br>
                
                <input type="submit" name="Cadastrar"><br><br>
                
                </form>
            </div>      
            <div id="rodape">
                Todos os direitos reservados
            </div>              
        </div>                
    </body>

</html>



