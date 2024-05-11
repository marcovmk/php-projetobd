<?php
    require_once("../cabecalho.html");

?>

    <h3> Inserir Produto </h3>
    <form>
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor"> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Selecione a categoria </label>
            <select class="form-select" name="categoria">
                <option value="1"> Livros </option>
                <option value="2"> Perecivel 1</option>
                <option value="3"> Eletronico 1</option>
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-success mt-3">
                    Salvar
                </button>
            </div>    
        </div>
    </form>


<?php
    require_once("../rodape.html");