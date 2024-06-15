<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_MOTORISTA'])) {
        $COD_MOTORISTA = $_GET['COD_MOTORISTA'];
        $_SESSION['COD_MOTORISTA'] = $COD_MOTORISTA;
    } else
        $COD_MOTORISTA = $_SESSION['COD_MOTORISTA'];
    if ($_POST){
        $nome = $_POST['NOME'];
        $num_carteira = $_POST['NUM_CARTEIRA'];
        $celular = $_POST['CELULAR'];
        if($nome != "" && $num_carteira != "" && $celular != ""){
            if(alterarMotorista($nome, $num_carteira, $celular,$_SESSION['COD_MOTORISTA']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarMotoristaID($COD_MOTORISTA);
?>

    <h3>Alterar Motorista</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
            <label for="NOME" class="form-label">Informe o Motorista</label>
                <input type="text" class="form-control" name="NOME" 
                    value="<?= $dados['NOME'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="NUM_CARTEIRA" class="form-label">Informe a carteira de motorista (Apenas Numeros)</label>
                <input type="text" maxlength ="9" class="form-control" 
                name="NUM_CARTEIRA" value="<?= $dados['NUM_CARTEIRA'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="CELULAR" class="form-label">Informe o celular EX: 18999999999</label>
                <input type="text" maxlength ="11" class="form-control" name="CELULAR" 
                    value="<?= $dados['CELULAR'] ?>">
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