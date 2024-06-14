<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Veiculo</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="placa" class="form-label">Informe a Placa</label>
                <input type="text" maxlenght ="7" class="form-control" name="placa">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="modelo" class="form-label">Informe o Modelo</label>
                <input type="text" class="form-control" name="modelo">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ano" class="form-label">Informe o Ano</label>
                <input type="text" maxlenght ="4" onkeypress ="return event.charcode >= 48 && event.charcode <=57" class="form-control" name="ano">
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
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        if($placa != "" && $modelo != "" && $ano != ""){
            if(inserirVeiculo($placa, $modelo, $ano))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");


