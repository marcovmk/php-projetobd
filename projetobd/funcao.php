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