<?php 
    include '../conexao.php';
    $sql = "SELECT cd_pessoa, nm_pessoa FROM pessoa ORDER BY nm_pessoa";
    
    $resultadoPessoas = mysqli_query($conexao, $sql);

    if (isset($_GET['id_produto'])){
        $sqlProduto = "SELECT id_produto, nm_produto, vl_preco FROM produto WHERE id_produto = " .$_GET['id_produto'];
        $resultadoProduto = mysqli_query($conexao, $sqlProduto);
        
        $produto = mysqli_fetch_array($resultadoProduto);
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
                <h2>Cadastro de Produtos</h2>
                    <a href="../index.html">Voltar a página inicial</a>
                    <!-- <a href="listaProduto.php">Acessar Lista de Produtos</a> | 
                    <a href="../pessoa/listaPessoa.php">Acessar Lista de Pessoas</a> |
                    <a href="../pessoa/formPessoa.php">Cadastrar Pessoa</a> -->
            
            </div>
                
            <div id="cadastro">
                    
                <form method="post" action="./gravaProduto.php">
                        
                    <?php 
                        if (isset($_GET['id_produto'])){
                            echo "Código: <br>";
                            echo "<input type='text' 
                            readonly='readonly' 
                            value='$_GET[id_produto]' 
                            name='id_produto'
                            readonly='readonly'><br><br>";
                        } 
                    ?>
                            Nome do Produto:<br>
                            <input type="text" name="nome" value="
                                <?php if (isset($produto['nm_produto'])){ 
                                               echo $produto['nm_produto'];
                                               } ?>" ><br><br>

                            Preço: <br>
                            <input type="text" name="preco" value="
                                    <?php if (isset($produto['vl_preco'])){
                                    echo $produto['vl_preco'];}
                                    ?>" ><br><br>

                            Comprador:
                            <select name="cd_comprador">
                                <option value=""> - Selecione - </option>
                                    <?php 
                                        while ($linha = mysqli_fetch_array($resultadoPessoas)){
                                            if ($linha['cd_pessoa'] == $produto['cd_comprador']){
                                                echo "<option  selected value='$linha[cd_pessoa]'>";

                                            } else {
                                                echo "<option value='$linha[cd_pessoa]'>";
                                            }

                                            echo $linha['nm_pessoa'];
                                            echo "</option>";
                                        }
                                    ?>

                        </select><br><br>
                        <input type="submit" value="Cadastrar">

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