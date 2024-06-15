<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Cliente</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Informe o Email</label>
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="celular" class="form-label">Informe o celular EX: 18999999999</label>
                <input type="text" maxlength ="11" class="form-control" name="celular">
            </div>
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
    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        if($nome != "" && $email != "" && $celular != ""){
            if(inserirCliente($nome, $celular, $email))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");


