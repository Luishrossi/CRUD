<?php 
    include '../conexao.php';
    $sql = "SELECT id_carro, nm_carro, ano, cd_proprietario, nm_pessoa FROM carro c JOIN pessoa ps ON (c.cd_proprietario = ps.cd_pessoa)";
    
    $resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <title>Document</title>
    </head>
    <body>

        <div id="menu">
            <h2>Lista de Carros</h2>
            <a href="../index.html">Voltar a página inicial</a>
        </div>

        <div id="tabela">
        
        </div>

        <div id="teste">
            <table>
                <tr> 
                    <td>Código</td>
                    <td>Nome Carro</td>
                    <td>Ano</td>
                    <td>Proprietário(a)</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>

                <?php 
                    while ($linha = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                            echo "<td>$linha[id_carro]</td>";
                            echo "<td>$linha[nm_carro]</td>";
                            echo "<td>$linha[ano]</td>";
                            echo "<td>$linha[nm_pessoa]</td>";

                            echo "<td>";
                            echo "<a href='formCarro.php?id_carro=$linha[id_carro]'><img src='../imagens/editar.png'width='50px' heigth='20px'</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='excluirCarro.php?id_carro=$linha[id_carro]'><img src='../imagens/excluir.png' width='50px' heigth='20px'></a>";
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