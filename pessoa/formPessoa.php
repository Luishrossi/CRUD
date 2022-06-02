<?php 
include '../conexao.php';
    if (isset($_GET['cd_pessoa'])) {
        
        $sql = "SELECT cd_pessoa, nm_pessoa, nr_cpf FROM pessoa WHERE cd_pessoa = $_GET[cd_pessoa]";
        $pessoa = mysqli_fetch_array(mysqli_query($conexao, $sql));
    
    } else {
        echo "";
    }


?>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <title>Cadastro de Pessoas</title>
    </head>

    <body>
        <div id="principal">

            <div id="menu">
                <h2>Cadastro de Pessoa</h2>
                <a href="../index.html">Voltar a página inicial</a>
            </div>

            <div id="cadastro">

                <form method="post" action="./recebePessoa.php">
                    
                <?php 
                    if (isset($_GET['cd_pessoa'])) {
                        echo "Código: <br>";
                        echo "<input type='text' 
                        name='cd_pessoa' 
                        value='$_GET[cd_pessoa]'
                        readonly='readonly'><br><br> ";
                    }    
                    
                ?>

                    Nome: <br> 
                    <input type="text" name="nm_pessoa" value="
                        <?php if (isset($pessoa['nm_pessoa'])){ 
                                    echo $pessoa['nm_pessoa'];
                                    }?>"> <br><br>
                    
                    CPF: <br>
                    <input type="text" name="nr_cpf" value="
                        <?php if (isset($pessoa['nr_cpf'])){ 
                                    echo $pessoa['nr_cpf'];
                                    }?>"> <br><br>
                                    
                    <input type="submit" value="Enviar">
                    
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