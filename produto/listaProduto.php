<?php 
    include '../conexao.php';
    $sql = "SELECT id_produto, nm_produto, vl_preco, cd_comprador, nm_pessoa FROM produto pr JOIN pessoa ps ON (pr.cd_comprador = ps.cd_pessoa)";
    
    $resultado = mysqli_query($conexao, $sql);
?>  
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>
        
        <div id="menu">
            <h2>Lista de produtos</h2>
            <a href="../index.html">Voltar a página inicial</a>
            <!-- <a href="../produto/formProduto.php">Cadastrar Produtos</a> |
            <a href="../pessoa/formPessoa.php">Cadastrar Pessoa</a> |
            <a href="../pessoa/listaPessoa.php">Acessar Lista de Pessoas</a> 
             -->
        </div>

        <div id="tabela">
        
        </div>
        
        <div id="teste">
            <table>
                <tr> 
                    <td>Código</td>
                    <td>Nome Produto</td>
                    <td>Preço</td>
                    <td>Comprador(a)</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
    
                <?php 
                    while ($linha = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                            echo "<td>$linha[id_produto]</td>";
                            echo "<td>$linha[nm_produto]</td>";
                            echo "<td>$linha[vl_preco]</td>";
                            echo "<td>$linha[nm_pessoa]</td>";

                            echo "<td>";
                            echo "<a href='formProduto.php?id_produto=$linha[id_produto]'><img src='../imagens/editar.png' width='50px' heigth='20px'></a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='excluirProduto.php?id_produto=$linha[id_produto]'><img src='../imagens/excluir.png' width='50px' heigth='20px'></a>";
                            echo "</td>";

                        echo "</tr>";
                    }
                ?>

            </table>
            
        </div>
        
        <div id="rodape">
                Todos os direitos reservados
        </div>


    </body>

</html>


