<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['COD_VIAGEM'])) {
        $COD_VIAGEM = $_GET['COD_VIAGEM'];
        $_SESSION['COD_VIAGEM'] = $COD_VIAGEM;
    } 
    if ($_POST){
        $COD_VIAGEM = $_SESSION['id'];
        if(excluirViagem($_SESSION['COD_VIAGEM']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarViagemId($COD_VIAGEM);
?>

    <h3>Excluir Viagem</h3>
    <form action="excluir_viagem.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="hora" class="form-label">Informe a descrição</label>
                <input type="time" class="form-control"     name="hora" value="<?= $dados['HORA_VIAGEM'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data</label>
                <input type="date" class="form-control" name="data" 
                    value="<?= $dados['DATA_VIAGEM'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione o Motorista</label>
                <select class="form-select" name="categoria" disabled>
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
            <div class="col">
                <label for="veiculo" class="form-label"> Selecione o Veiculo</label>
                <select class="form-select" name="veiculo" disabled>
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
            <div class="col">
                <label for="cliente" class="form-label"> Selecione a categoria</label>
                <select class="form-select" name="cliente" disabled>
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
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir">
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");