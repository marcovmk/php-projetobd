<?php
    require_once("../cabecalho.php");
    if (isset($_GET['COD_VEICULO'])) {
        $COD_VEICULO = $_GET['COD_VEICULO'];
        session_start();
        $_SESSION['COD_VEICULO'] = $COD_VEICULO;
    } else
        $COD_VEICULO = $_SESSION['COD_VEICULO'];
    if ($_POST){
        $placa = $_POST['PLACA'];
        $modelo = $_POST['MODELO'];
        $ano = $_POST['ANO'];
        if($placa != "" && $modelo != "" && $ano != ""){
            if(alterarVeiculo($placa , $modelo, $ano, $_SESSION['COD_VEICULO']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarVeiculoID($COD_VEICULO);
?>

    <h3>Alterar Placa</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
            <label for="PLACA" class="form-label">Informe a Placa</label>
                <input type="text" maxlenght ="7" class="form-control" name="PLACA" 
                    value="<?= $dados['PLACA'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="MODELO" class="form-label">Informe o Modelo</label>
                <input type="text" class="form-control" 
                name="MODELO" value="<?= $dados['MODELO'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ano" class="form-label">Informe o Ano</label>
                <input type="text" maxlenght ="4" onkeypress ="return event.charcode >= 48 && event.charcode <=57" class="form-control" name="ano" 
                    value="<?= $dados['ano'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");