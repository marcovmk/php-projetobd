<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_CLIENTE'])) {
        $COD_CLIENTE = $_GET['COD_CLIENTE'];
        $_SESSION['COD_CLIENTE'] = $COD_CLIENTE;
    } 
    if ($_POST){
        $COD_CLIENTE = $_SESSION['COD_CLIENTE'];
        if(excluirMotorista($_SESSION['COD_CLIENTE']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarClienteID($COD_CLIENTE);
?>

    <h3>Excluir Cliente</h3>
    <form action="excluir_cliente.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="NOME" class="form-label">Informe o Nome</label>
                <input type="text" class="form-control" name="NOME" disabled
                    value="<?= $dados['NOME'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="EMAIL" class="form-label">Informe o Email</label>
                <input type="text" class="form-control"     name="EMAIL" value="<?= $dados['EMAIL'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="TELEFONE" class="form-label">Informe o celular EX: 18999999999</label>
                <input type="text" class="form-control" name="TELEFONE" 
                    value="<?= $dados['TELEFONE'] ?>" disabled>
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