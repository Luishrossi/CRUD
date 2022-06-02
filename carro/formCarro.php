<?php 
    include '../conexao.php';

    $sql = "SELECT cd_pessoa, nm_pessoa FROM pessoa ORDER BY nm_pessoa";
    $resultadoPessoas = mysqli_query($conexao, $sql);

    if (isset($_GET['id_carro'])){
        $sqlCarro = "SELECT id_carro, nm_carro, ano FROM carro WHERE id_carro = ". $_GET['id_carro'];
        $resultadoCarro = mysqli_query($conexao, $sqlCarro);

        $carro = mysqli_fetch_array($resultadoCarro);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">

    </head>
    <body>
        <div id="principal">
            
            <div id="menu">

                <h2>Cadastro de Carro</h2>
                <a href="../index.html">Voltar a página inicial</a>

            </div>

            <div id="cadastro">
                <form method="post" action="./recebeCarro.php">
                    <?php 
                        if (isset($_GET['id_carro'])){
                            echo "Código: <br>";
                            echo "<input type='text'
                            value='$_GET[id_carro]'
                            readonly='readonly'<br><br>";
                        }
                    
                    ?>

                    Nome do Carro: <br>
                    <input type="text" name="nm_carro" value="<?php
                            if(isset($carro['nm_carro'])){
                                echo $carro['nm_carro'];    
                            }?>"> <br><br>

                    Ano do Carro: <br>
                    <input type="text" name="ano" value="<?php 
                            if (isset($carro['ano'])){
                                echo $carro['ano'];
                            }?>"> <br><br>

                    Proprietário: <br>
                    <select name="cd_proprietario">
                        <option> - Selecione - </option>
                            <?php 
                                while($linha = mysqli_fetch_array($resultadoPessoas)) {
                                    if ($linha['cd_pessoa'] == $carro['cd_proprietario']){
                                        echo "<option  selected value='$linha[cd_pessoa]'>";
                                    
                                    }   else {
                                        echo "<option value='$linha[cd_pessoa]'>";
                                    }    
                                    echo $linha['nm_pessoa'];
                                    echo "</option>";
                                }
                            ?>

                    </select><br><br>


                    <input type="submit" value="Enviar"><br><br>
                    <p>Se o propritário não estiver cadastrado <br><a href="../pessoa/formPessoa.php"> Clique Aqui</a></p>
                </form>
            </div>
            <div id="vazio">
                        
            </div>
            <div id="rodape">
                Todos os direitos reservados
            </div>
    </div>
    </body>
    
</html>