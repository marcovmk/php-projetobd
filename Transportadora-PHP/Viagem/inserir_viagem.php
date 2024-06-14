<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Viagem</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="hora" class="form-label">Informe a hora da vaigem</label>
                <input type="time" class="form-control" name="hora">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data da viagem</label>
                <input type="date" class="form-control" name="data">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="motorista" class="form-label"> Selecione o Motorista</label>
                <select class="form-select" name="motorista">
                    <?php
                       $linhas = retornarMotorista();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['COD_MOTORISTA']}'>{$l['NOME']}</option>";
                       } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="veiculo" class="form-label"> Selecione o Veiculo</label>
                <select class="form-select" name="veiculo">
                    <?php
                       $linhas = retornarVeiculo();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['COD_VEICULO']}'>{$l['MODELO']}</option>";
                       } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cliente" class="form-label"> Selecione o Cliente</label>
                <select class="form-select" name="cliente">
                    <?php
                       $linhas = retornarCliente();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['COD_CLIENTE']}'>{$l['NOME']}</option>";
                       } 
                    ?>
                </select>
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
        $hora = $_POST['hora'];
        $data = $_POST['data'];
        $motorista = $_POST['motorista'];
        $veiculo = $_POST['veiculo'];
        $cliente = $_POST['cliente'];
        if($data != "" && $hora != "" && $motorista != "" && $veiculo != "" && $cliente != ""){
            if(inserirViagem($hora, $data, $motorista, $veiculo, $cliente))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");
