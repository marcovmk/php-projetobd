<?php
    require_once("../cabecalho.php");
    if (isset($_GET['COD_CLIENTE'])) {
        $COD_CLIENTE = $_GET['COD_CLIENTE'];
        session_start();
        $_SESSION['COD_CLIENTE'] = $COD_CLIENTE;
    } else
        $COD_CLIENTE = $_SESSION['COD_CLIENTE'];
    if ($_POST){
        $nome = $_POST['NOME'];
        $email = $_POST['EMAIL'];
        $telefone = $_POST['TELEFONE'];
        if($nome != "" && $email != "" && $telefone!= ""){
            if(alterarCliente($nome, $telefone, $email,$_SESSION['COD_CLIENTE']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarClienteID($COD_CLIENTE);
?>

    <h3>Alterar Cliente</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
            <label for="NOME" class="form-label">Informe o Nome<</label>
                <input type="text" class="form-control" name="NOME" 
                    value="<?= $dados['NOME'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="EMAIL" class="form-label">Informe o Email</label>
                <input type="text" class="form-control"     name="EMAIL" value="<?= $dados['EMAIL'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="TELEFONE" class="form-label">Informe o celular EX: 18999999999</label>
                <input type="text" class="form-control" name="TELEFONE" 
                    value="<?= $dados['TELEFONE'] ?>">
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