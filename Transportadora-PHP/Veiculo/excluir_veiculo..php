<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_VEICULO'])) {
        $COD_VEICULO = $_GET['COD_VEICULO'];
        $_SESSION['COD_VEICULO'] = $COD_VEICULO;
    } 
    if ($_POST){
        $COD_VEICULO = $_SESSION['COD_VEICULO'];
        if(excluirVeiculo($_SESSION['COD_VEICULO']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarVeiculoID($COD_VEICULO);
?>

    <h3>Excluir Veiculo</h3>
    <form action="excluir_veiculo.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="PLACA" class="form-label">Informe a Placa</label>
                <input type="text" maxlenght ="7" class="form-control" name="PLACA" disabled
                    value="<?= $dados['PLACA'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="MODELO" class="form-label">Informe o Modelo</label>
                <input type="text" class="form-control"     name="MODELO" value="<?= $dados['MODELO'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ANO" class="form-label">Informe o Ano</label>
                <input type="text" class="form-control" name="ANO" 
                    value="<?= $dados['ANO'] ?>" disabled>
            </div>
        </div>       
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir">
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");