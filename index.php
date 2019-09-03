<?php
/** carregando os arquivos */
require './core/flight/Flight.php';
require './core/NotORM.php';
require './core/PDOConfig.php';

/** visualização de erros */
Flight::set('flight.log_errors', false);
Flight::set('flight.handle_errors', false);

/** rotenando a página principal **/
Flight::route('/', function() {
    /** chamando a página principal */
    include './view/home.html';


});

/**
*** Tipo de requisição: GET (mas poderia ser DELETE)
*** apagando um registro na tabela de registros
*/


Flight::route('GET /registro/delete/@id', function($id) {
    //abrindo conexão
    $db = new NotORM(PDOConfig::getInstance());    
    //validando o ID
    if(isset($id)){
        //recuperando o registro no banco
        //e trazendo um unico objeto
        $registro = $db->registro->where("id = ?", $id)->fetch();
        //verificando se foi retornado um objeto
        if($registro['id']){            
            //enviando a solicitação de exclusão
            $registro->delete();
              //retornando um feedback
         echo "Registro apagado";
        }else{
            //retornando um feedback
            echo "Registro não encontrado";
        }
            
    }else{
        //requisição inválida
        echo "Registro não encontrado";
    }
    
  
    
});

/**
*** Tipo de requisição: POST
*** inserindo um registro na tabela de registros
*/
Flight::route('POST /registro/insert', function() {
    //criando o objeto do banco de dados
    $db = new NotORM(PDOConfig::getInstance());

    $db->registro->insert(
        array(
            "horario_inicial" => $_POST['horario_inicial'],
            "horario_final" => $_POST['horario_final'],
            "vazao" => $_POST['vazao'],
            "volume" => $_POST['volume'],
            "ponto_medicao_id" => 1,
        )
    );
    // escrendo um feedback
    echo "Registro realizado com sucesso";
});

/**
 *** Tipo de requisição: GET
 *** Listando os registros em JSON
 */
Flight::route('/registro/list(/@id_projeto)', function($id_projeto) {
    //abrindo conexao
    $db = new NotORM(PDOConfig::getInstance());
    //pegando os dados de todos dos registros
   $data = !isset($id_projeto) ? $db->registro() : $db->registro->where("id_projeto = ?", $id_projeto);
    //verificando se retornou dados
    if(count($data)){                                                                                                        

        //$dados = array();

        //criando o cabeçalho JSON
        header('Content-Type: application/json');
        //retornando o resultado no formato JSON
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
});





/**
*** Tipo de requisição: GET (mas poderia ser DELETE)
*** apagando um registro na tabela de projeto
*/


Flight::route('GET /projeto/delete/@id', function($id) {
    //abrindo conexão
    $db = new NotORM(PDOConfig::getInstance());    
    //validando o ID
    if(isset($id)){
        //recuperando o registro no banco
        //e trazendo um unico objeto
        $projeto = $db->projeto->where("id = ?", $id)->fetch();
        //verificando se foi retornado um objeto
        if($projeto['id']){            
            //enviando a solicitação de exclusão
            $projeto->delete();
        //retornando um feedback
        echo "projeto apagado";
        }else{
            //retornando um feedback
            echo "projeto não encontrado";
        }
            
    }else{
        //requisição inválida
        echo "projeto não encontrado";
    }
    
   
    
});

/**
*** Tipo de requisição: POST
*** inserindo um registro na tabela de projeto
*/
Flight::route('POST /projeto/insert', function() {
    //criando o objeto do banco de dados
    $db = new NotORM(PDOConfig::getInstance());

    $db->projeto->insert(
        array(
            "nome" => $_POST['nome'],
            "endereco" => $_POST['endereco'],
            "descricao" => $_POST['descricao'],
            //"ponto_medicao_id" => 1, /**
        )
    );
    // escrendo um feedback
    echo "projeto cadastrado com sucesso";
});

/**
 *** Tipo de requisição: GET
 *** Listando os registros em JSON
 */
Flight::route('/projeto/list', function() {
    //abrindo conexao
    $db = new NotORM(PDOConfig::getInstance());
    //pegando os dados de todos dos projetos
    $data = $db->projeto();
    //verificando se retornou dados
    if(count($data)){

        //$dados = array();

        //criando o cabeçalho JSON
        header('Content-Type: application/json');
        //retornando o resultado no formato JSON
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
});




/**
*** Tipo de requisição: GET (mas poderia ser DELETE)
*** apagando um registro na tabela de ponto_medicao
*/


Flight::route('GET /ponto_medicao/delete/@id', function($id) {
    //abrindo conexão
    $db = new NotORM(PDOConfig::getInstance());    
    //validando o ID
    if(isset($id)){
        //recuperando o registro no banco
        //e trazendo um unico objeto
        $ponto_medicao = $db->ponto_medicao->where("id = ?", $id)->fetch();
        //verificando se foi retornado um objeto
        if($ponto_medicao['id']){            
            //enviando a solicitação de exclusão
            $ponto_medicao->delete();
             //retornando um feedback
        echo "Ponto de medição apagado";
        }else{
            //retornando um feedback
            echo "Ponto de medição não localizado.";
        }
    
});

/**
*** Tipo de requisição: POST
*** inserindo um registro na tabela de ponto_medicao
*/
Flight::route('POST /ponto_medicao/insert', function() {
    //criando o objeto do banco de dados
    $db = new NotORM(PDOConfig::getInstance());

    $db->ponto_medicao->insert(
        array(
            "descricao" => $_POST['descricao'],
            "projeto_id" => 2,
        )
    );
    // escrendo um feedback
    echo "Ponto de mediçao cadastrado com sucesso";
});

/**
 *** Tipo de requisição: GET
 *** Listando os registros em JSON
 */
Flight::route('/ponto_medicao/list(/@id_projeto)', function($id_projeto) {
    //abrindo conexao
    $db = new NotORM(PDOConfig::getInstance());
    //pegando os dados de todos dos ponto_medicao
    $data = !isset($id_projeto) ? $db->ponto_medicao() : $db->ponto_medicao->where("id_projeto = ?", $id_projeto);
    //verificando se retornou dados
    if(count($data)){

        //$dados = array();

        //criando o cabeçalho JSON
        header('Content-Type: application/json');
        //retornando o resultado no formato JSON
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
});



/**
*** Exibir erros
***** Só será mostrado caso aconteça algum erro
*/
Flight::map('error', function(Exception $ex) {
    $params ['Get Message'] = $ex->getMessage();
    $params ['Get File'] = $ex->getCode();
    $params ['Get File'] = $ex->getFile();
    $params ['Get Line'] = $ex->getLine();
    $params ['Get Trace'] = '<pre style="font-size: 14px">' . $ex->getTraceAsString() . '</pre>';

    include "./inc/page/error.php";
});

/*******************************
 * INICIALIZACAO DO FRAMEWORK
********************************/
 
Flight::start();
