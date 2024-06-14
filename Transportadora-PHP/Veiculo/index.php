<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Veiculos</h3>

    <a href="inserir_veiculo.php" class="btn btn-primary mt-3">Adicionar Veiculo</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Ano</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Chamo a função retornarProdutos() contida no arquivo funcao.php 
                //para retornar todos os registros da tabela produto
                $linhas = retornarVeiculo();
                //Utilizo esse laço para que a variável $l receba a cada passo uma linha da tabela produto
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $l['PLACA'] ?></td>
                <td><?= $l['MODELO'] ?></td>
                <td><?= $l['ANO'] ?></td>
                <td>
                    <a href="alterar_veiculo.php?id=<?= $l['COD_VEICULO'] ?>" class="btn btn-warning"> Alterar </a>
                    <a href="excluir_veiculo..php?id=<?= $l['COD_VEICULO'] ?>" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


<?php
    require_once("../rodape.html");