<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Motoristas</h3>

    <a href="inserir_motorista.php" class="btn btn-primary mt-3">Adicionar Motorista</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Numero da Carteira</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Chamo a função retornarProdutos() contida no arquivo funcao.php 
                //para retornar todos os registros da tabela produto
                $linhas = retornarMotorista();
                //Utilizo esse laço para que a variável $l receba a cada passo uma linha da tabela produto
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $l['NOME'] ?></td>
                <td><?= $l['NUM_CARTEIRA'] ?></td>
                <td><?= $l['CELULAR'] ?></td>
                <td>
                    <a href="alterar_motorista.php?id=<?= $l['COD_MOTORISTA'] ?>" class="btn btn-warning"> Alterar </a>
                    <a href="excluir_motorista.php?id=<?= $l['COD_MOTORISTA'] ?>" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


<?php
    require_once("../rodape.html");