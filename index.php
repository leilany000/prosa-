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
    include './view/page/home.php';
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
        }else{
            //retornando um feedback
            echo "Registro não encontrado";
        }
            
    }else{
        //requisição inválida
        echo "Registro não encontrado";
    }
    
    //retornando um feedback
    echo "Registro apagado";
    
});

/**
*** Tipo de requisição: POST
*** inserindo um registro na tabela de registros
*/
Flight::route('POST /registro/insert', function() {
    //criando o objeto do banco de dados
    $db = new NotORM(PDOConfig::getInstance());    
    //inserindo o registro
    $db->registro->insert(
        array(
            "horario_inicial" => $_POST['horario_inicial'],
            "horario_final" => $_POST['horario_final'],
            "vazao" => 1000
        )
    );
    // escrendo um feedback
    echo "Registro realizado com sucesso";
});

/**
 *** Tipo de requisição: GET
 *** Listando os registros em JSON
 */
Flight::route('/registro/list', function() {
    //abrindo conexao
    $db = new NotORM(PDOConfig::getInstance());
    //pegando os dados de todos dos registros
    $data = $db->registro();
    //verificando se retornou dados
    if(count($data)){

        $dados = array();

        //criando o cabeçalho JSON
        header('Content-Type: application/json');
        //retornando o resultado no formato JSON
        echo json_encode($dados, JSON_PRETTY_PRINT);
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