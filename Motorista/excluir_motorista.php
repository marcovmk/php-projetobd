<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_MOTORISTA'])) {
        $COD_MOTORISTA = $_GET['COD_MOTORISTA'];
        $_SESSION['COD_MOTORISTA'] = $COD_MOTORISTA;
    } 
    if ($_POST){
        $COD_MOTORISTA = $_SESSION['COD_MOTORISTA'];
        if(excluirMotorista($_SESSION['COD_MOTORISTA']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarMotoristaId($COD_MOTORISTA);
?>

    <h3>Excluir Motorista</h3>
    <form action="excluir_motorista.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="NOME" class="form-label">Informe o Motorista</label>
                <input type="text" class="form-control" name="NOME" disabled
                    value="<?= $dados['NOME'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="NUM_CARTEIRA" class="form-label">Informe a carteira de motorista (Apenas Numeros)</label>
                <input type="text" class="form-control"     name="NUM_CARTEIRA" value="<?= $dados['NUM_CARTEIRA'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="CELULAR" class="form-label">Informe o celular EX: 18999999999</label>
                <input type="text" class="form-control" name="CELULAR" 
                    value="<?= $dados['CELULAR'] ?>" disabled>
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