<?php 
    include '../conexao.php';
    $sql = "SELECT cd_pet, nm_pet, cd_dono, nm_pessoa FROM pet pt JOIN pessoa ps ON (pt.cd_dono = ps.cd_pessoa)";
    
    $resultado = mysqli_query($conexao, $sql);
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>

        <div id="menu">
            <h2>Lista de Pets</h2>
            <a href="../index.html">Voltar a página inicial</a>
            <!-- <a href="./formPet.php">Cadastrar outro pet </a><br>
            <a href="../pessoa">Cadastrar Pessoa</a> -->
            
        </div>

        <div id="tabela">
        
        </div>

        <div id="teste">
            <table>
                <tr> 
                    <td>COD</td>
                    <td>NOME DO PET</td>
                    <td>DONO</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
                
                <?php 
                while ($linha = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>$linha[cd_pet]</td>";
                    echo "<td>$linha[nm_pet]</td>";
                    echo "<td>$linha[nm_pessoa]</td>";
                    
                    echo "<td>";
                    echo "<a href='formPet.php?cd_pet=$linha[cd_pet]'><img src='../imagens/editar.png' width='50px' heigth='20px'>";
                    echo "</a>";

                    echo "<td>";
                    echo "<a href='excluirPet.php?cd_pet=$linha[cd_pet]'><img src='../imagens/excluir.png' width='50px' heigth='20px'></a>";
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



