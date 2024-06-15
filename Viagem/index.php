<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Viagens</h3>

    <a href="inserir_viagem.php" class="btn btn-primary mt-3">Adicionar Viagem</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Data</th>
                <th>Motorista</th>
                <th>Veiculo</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Chamo a função retornarProdutos() contida no arquivo funcao.php 
                //para retornar todos os registros da tabela produto
                $linhas = retornarViagem();
                //Utilizo esse laço para que a variável $l receba a cada passo uma linha da tabela produto
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $l['HORA_VIAGEM'] ?></td>
                <td><?= $l['DATA_VIAGEM'] ?></td>
                <td><?= $l['MOTORISTA'] ?></td>
                <td><?= $l['VEICULO'] ?></td>
                <td><?= $l['CLIENTE'] ?></td>                
                <td>
                    <a href="alterar_viagem.php?COD_VIAGEM=<?= $l['COD_VIAGEM'] ?>" class="btn btn-warning"> Alterar </a>
                    <a href="excluir_viagem.php?COD_VIAGEM=<?= $l['COD_VIAGEM'] ?>" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


<?php
    require_once("../rodape.html");