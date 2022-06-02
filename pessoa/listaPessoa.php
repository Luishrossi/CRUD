<?php 

    include '../conexao.php';
    $sql = "SELECT cd_pessoa, nm_pessoa, nr_cpf FROM pessoa";
    $resultado = mysqli_query($conexao, $sql);

?> 
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>
        <div id="menu">
            <h2>Lista de Pessoas</h2>
            <!-- <a href="formPessoa.php">Cadastrar outra pessoa </a> -->
            <a href="../index.html">Voltar a página principal</a>
            
        </div>

        <div id="tabela">
            
        </div>

        <div id="teste">
            <table>
                <tr> 
                    <td>Código</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            <?php 
                while ($linha = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                        echo "<td>$linha[cd_pessoa]</td>";
                        echo "<td>$linha[nm_pessoa]</td>";
                        echo "<td>$linha[nr_cpf]</td>";

                        echo "<td>";
                        echo "<a href='formPessoa.php?cd_pessoa=$linha[cd_pessoa]'><img src='../imagens/editar.png'  width='50px' heigth='20px'></a>";
                        echo "<td>";
                        
                        echo "<a href='excluirPessoa.php?cd_pessoa=$linha[cd_pessoa]'><img src='../imagens/excluir.png'  width='50px' heigth='20px'></a>";
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