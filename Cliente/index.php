<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Clientes</h3>

    <a href="inserir_cliente.php" class="btn btn-primary mt-3">Adicionar Veiculo</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Chamo a função retornarProdutos() contida no arquivo funcao.php 
                //para retornar todos os registros da tabela produto
                $linhas = retornarCliente();
                //Utilizo esse laço para que a variável $l receba a cada passo uma linha da tabela produto
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $l['NOME'] ?></td>
                <td><?= $l['TELEFONE'] ?></td>
                <td><?= $l['EMAIL'] ?></td>
                <td>
                    <a href="alterar_cliente.php?COD_CLIENTE=<?= $l['COD_CLIENTE'] ?>" class="btn btn-warning"> Alterar </a>
                    <a href="excluir_cliente.php?COD_CLIENTE=<?= $l['COD_CLIENTE'] ?>" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


<?php
    require_once("../rodape.html");