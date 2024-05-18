<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=bancophp", "root", "");
        return $conexao;
    }

    function retornarCategorias(){
        try{
            $sql = "SELECT * FROM CATEGORIA";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }

    function inserirProduto($nome, $descricao, $valor, $categoria){
        try {
            $sql = "INSERT INTO PRODUTO (NOME, DESCRICAO, VALOR, CATEGORIA_ID) VALUES (:NOME, :DESCRICAO, :VALOR, :CATEGORIA)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":NOME", $nome);
            $stmt->bindValue(":DESCRICAO", $descricao);
            $stmt->bindValue(":VALOR", $valor);
            $stmt->bindValue(":CATEGORIA", $categoria);
            return $stmt->execute();
        } catch(Exception $e){
            return 0;
        }
    }
   
    function retornarProdutos(){
        try{
            $sql = "SELECT P.ID, P.NOME, P.DESCRICAO, P.VALOR, C.DESCRICAO AS CATEGORIA FROM PRODUTO P INNER JOIN CATEGORIA C ON C.ID = P.CATEGORIA_ID";
            $conexao = conectarBanco();
        return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
        } 
