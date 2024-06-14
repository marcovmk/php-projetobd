<?php

    //Função para conexão com o banco de dados
    function conectarBanco(){
        //Instancio o meu objeto PDO que fornece as funções para manipulação dos dados
        $conexao = new PDO("mysql:host=localhost; dbname=TRANSPORTADORA", "root", "");
        return $conexao;
    }

    /*Existe uma relação da tabela categoria com a tabela produto. Portanto, preciso buscar todas as
    categorias do banco de dados para poder relacionar com os registros de produtos na minha aplicação
    A função abaixo faz essa busca e retorna todos os registros de categorias*/
    function retornarMotorista(){
        try {
            $sql = "SELECT * FROM MOTORISTA";   
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function retornarVeiculo(){
        try {
            $sql = "SELECT * FROM VEICULO";   
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function retornarCliente(){
        try {
            $sql = "SELECT * FROM CLIENTE";   
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    /*Para poder alterar ou excluir os produtos, preciso consultar todos os registros do banco de dados
    Utilizo o INNER JOIN para buscar no banco também os dados da categoria, para poder mostrar o nome da categoria 
    para o usuário, não apenas o seu código*/
    function retornarProdutos(){
        try {
            $sql = "SELECT p.*, c.descricao as categoria FROM produto p
                    INNER JOIN categoria c ON c.id = p.categoria_id";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    //Função que realiza a inserção de um produto
    function inserirMotorista($nome, $num_carteira, $celular){
        try{ 
            $sql = "INSERT INTO MOTORISTA (NOME, NUM_CARTEIRA, CELULAR)VALUES (:nome, :num_carteira, :celular)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":num_carteira", $num_carteira);
            $stmt->bindValue(":celular", $celular);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //Para poder alterar ou excluir um registro, precisamos consultar o registro pela sua chave primária (id)
    function consultarMotoristaID($cod_motorista){
        try{ 
            $sql = "SELECT * FROM MOTORISTA WHERE cod_motorista = :cod_motorista";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_motorista", $cod_motorista);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
    //Função que realiza a alteração de um produto
    function alterarMotorista($nome, $num_carteira, $celular, $cod_motorista){
        try{ 
            $sql = "UPDATE MOTORISTA SET nome = :nome, num_carteira = :num_carteira, celular = :celular WHERE cod_motorista = :cod_motorista";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":descricao", $num_carteira);
            $stmt->bindValue(":celular", $celular);
            $stmt->bindValue(":cod_motorista", $cod_motorista);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //Função que realiza a exclusão de um produto
    function excluirMotorista($cod_motorista){
        try{ 
            $sql = "DELETE FROM produto WHERE cod_motorista = :cod_motorista";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_motorista", $cod_motorista);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //CLIENTE
    function consultarClienteID($cod_cliente){
        try{ 
            $sql = "SELECT * FROM MOTORISTA WHERE cod_cliente = :cod_cliente";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_cliente", $cod_cliente);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function inserirCliente($nome, $telefone, $email){
        try{ 
            $sql = "INSERT INTO CLIENTE (NOME, TELEFONE, EMAIL)VALUES (:nome, :telefone, :email)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":email", $email);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function consultarCliente($cod_cliente){
        try{ 
            $sql = "SELECT * FROM CLIENTE WHERE cod_cliente = :cod_cliente";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_cliente", $cod_cliente);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function alterarCliente($nome, $telefone, $email, $cod_cliente){
        try{ 
            $sql = "UPDATE CLIENTE SET nome = :nome, telefone = :telefone, email = :email WHERE cod_cliente = :cod_cliente";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":cod_cliente", $cod_cliente);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function excluirCliente($cod_cliente){
        try{ 
            $sql = "DELETE FROM CLIENTE WHERE cod_cliente = :cod_cliente";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_cliente", $cod_cliente);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //VEICULO
    function consultarVeiculoID($cod_veiculo){
        try{ 
            $sql = "SELECT * FROM MOTORISTA WHERE cod_veiculo = :cod_veiculo";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function inserirVeiculo($placa, $modelo, $ano){
        try{ 
            $sql = "INSERT INTO MOTORISTA (PLACA, MODELO, ANO)VALUES (:placa, :modelo, :ano)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":placa", $placa);
            $stmt->bindValue(":modelo", $modelo);
            $stmt->bindValue(":ano", $ano);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function consultarVeiculo($cod_veiculo){
        try{ 
            $sql = "SELECT * FROM CLIENTE WHERE cod_veiculo = :cod_veiculo";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function alterarVeiculo($placa, $modelo, $ano, $cod_veiculo){
        try{ 
            $sql = "UPDATE CLIENTE SET placa = :placa, modelo = :modelo, ano = :ano WHERE cod_veiculo = :cod_veiculo";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":placa", $placa);
            $stmt->bindValue(":modelo", $modelo);
            $stmt->bindValue(":ano", $ano);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function excluirVeiculo($cod_veiculo){
        try{ 
            $sql = "DELETE FROM VEICULO WHERE cod_veiculo= :cod_veiculo";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
    //VIAGEM
    function consultarViagemID($cod_viagem){
        try{ 
            $sql = "SELECT * FROM MOTORISTA WHERE $cod_viagem = :$cod_viagem";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":$cod_viagem", $$cod_viagem);
            //Executo a consulta
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function inserirViagem($hora_viagem, $data_viagem, $cod_motorista, $cod_veiculo, $cod_cliente){
        try{ 
            $sql = "INSERT INTO VIAGEM (HORA_VIAGEM, DATA_VIAGEM, COD_VEICULO, COD_MOTORISTA, COD_CLIENTE)
                            VALUES (:hora_viagem, :data_viagem, :cod_veiculo, cod_motorista, cod_cliente)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":hora_viagem", $hora_viagem);
            $stmt->bindValue(":data_viagem", $data_viagem);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            $stmt->bindValue(":cod_motorista", $cod_motorista);
            $stmt->bindValue(":cod_cliente", $cod_cliente);  
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //Função que realiza a alteração de um produto
    function alterarViagem($hora_viagem, $data_viagem, $cod_motorista, $cod_veiculo, $cod_cliente, $cod_viagem){
        try{ 
            $sql = "UPDATE VIAGEM SET hora_viagem = :hora_viagem, data_viagem = :data_viagem, cod_veiculo = :cod_veiculo, 
                                      cod_motorista = :cod_motorista, cod_cod_cliente = :cod_cod_cliente 
                    WHERE cod_viagem = :cod_viagem";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":hora_viagem", $hora_viagem);
            $stmt->bindValue(":data_viagem", $data_viagem);
            $stmt->bindValue(":cod_veiculo", $cod_veiculo);
            $stmt->bindValue(":cod_motorista", $cod_motorista);
            $stmt->bindValue(":cod_cliente", $cod_cliente);
            $stmt->bindValue(":cod_viagem", $cod_viagem);                       
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    //Função que realiza a exclusão de um produto
    function excluirViagem($cod_viagem){
        try{ 
            $sql = "DELETE FROM viagem WHERE cod_viagem = :cod_viagem";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":cod_viagem", $cod_viagem);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarViagem(){
        try {
            $sql = "SELECT VA.*, 
                            M.NOME as MOTORISTA,
                            VI.MODELO as VEICULO,
                            C.NOME as CLIENTE
                    FROM VIAGEM VA
                    INNER JOIN MOTORISTA M 
                        ON M.COD_MOTORISTA = VA.COD_MOTORISTA
                    INNER JOIN CLIENTE C
                        ON C.COD_CLIENTE = VA.COD_CLIENTE
                     INNER JOIN VEICULO VI
                        ON VI.COD_VEICULO = VA.COD_VEICULO";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }


