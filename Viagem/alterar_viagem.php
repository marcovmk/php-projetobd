<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_VIAGEM'])) {
        $COD_VIAGEM = $_GET['COD_VIAGEM'];
        $_SESSION['COD_VIAGEM'] = $COD_VIAGEM;
    } else
        $COD_VIAGEM = $_SESSION['COD_VIAGEM'];
    if ($_POST){
        $hora = $_POST['HORA_VIAGEM'];
        $data = $_POST['DATA_VIAGEM'];
        $motorista = $_POST['MOTORISTA'];
        $veiculo = $_POST['VEICULO'];
        $cliente = $_POST['CLIENTE'];
        if($data != "" && $hora != "" && $motorista != "" && $veiculo != "" && $cliente != ""){
            if(alterarViagem($hora, $data, $motorista, $veiculo, $cliente,$_SESSION['$COD_VIAGEM']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarViagemID($COD_VIAGEM);
?>

    <h3>Alterar Viagem</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="hora" class="form-label">Informe a hora da viagem</label>
                <input type="time" class="form-control" name="hora" 
                    value="<?= $dados['HORA_VIAGEM'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data da viagem</label>
                <input type="date" class="form-control"     name="data" value="<?= $dados['DATA_VIAGEM'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="motorista" class="form-label"> Selecione o Motorista</label>
                <select class="form-select" name="motorista">
                    <?php
                       $linhas = retornarMotorista();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['COD_MOTORISTA'] == $dados["COD_MOTORISTA"])
                            echo "<option selected value='{$l['COD_MOTORISTA']}'>{$l['NOME']}</option>"; 
                        else 
                            echo "<option value='{$l['COD_MOTORISTA']}'>{$l['NOME']}</option>"; 
                       } 
                    ?>
                </select>
            </div>
            <div class="row">
            <div class="col">
                <label for="veiculo" class="form-label"> Selecione o veiculo</label>
                <select class="form-select" name="veiculo">
                    <?php
                       $linhas = retornarVeiculo();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['COD_VEICULO'] == $dados["COD_VEICULO"])
                            echo "<option selected value='{$l['COD_VEICULO']}'>{$l['MODELO']}</option>"; 
                        else 
                            echo "<option value='{$l['COD_VEICULO']}'>{$l['MODELO']}</option>"; 
                       } 
                    ?>
                </select>
            </div>
            <div class="row">
            <div class="col">
                <label for="cliente" class="form-label"> Selecione o cliente</label>
                <select class="form-select" name="cliente">
                    <?php
                       $linhas = retornarCliente();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['COD_CLIENTE'] == $dados["COD_CLIENTE"])
                            echo "<option selected value='{$l['COD_CLIENTE']}'>{$l['NOME']}</option>"; 
                        else 
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
    require_once("../rodape.html");