<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Motorista</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="num_carteira" class="form-label">Informe a carteira de motorista (Apenas Numeros)</label>
                <input type="text" maxlength ="9" class="form-control" name="num_carteira">
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
        $num_carteira = $_POST['num_carteira'];
        $celular = $_POST['celular'];
        if($nome != "" && $num_carteira != "" && $celular != ""){
            if(inserirMotorista($nome, $num_carteira, $celular))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");


