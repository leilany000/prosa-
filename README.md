# Programa de Sustentabilidade da Água - PROSA (API)


Esse projeto visa dispor uma API de acesso aos dados do Programa de Sustentabilidade da Água: Sistema e Mobile (PROSA). Suas funcionalidades estão listadas a seguir:

1. Visualização de dados de usuários, medições, projetos e pontos de medição;
2. Envio de dados para registros (usuários, medições, projetos e pontos de medição);
3. Visualização de relatórios.

Essas funcionalidades estão incluídas na versão 1.0 do *Prosa Mobile*.

## Table of contents
1. [Tecnologias utilizadas](#tecnologias-utilizadas)
2. [API](#api)
3. [Contribuidores](#contribuidores)

##  <a id="tecnologias-utilizadas" href="#">:link:</a> As tecnologias utilizadas



### PHP
Por ser uma linguagem simples e poderosa, o PHP foi a melhor escolha para esse projeto. Contudo, para tornar o projeto ainda mais dinâmico, com manutenabilidade elevada, foram escolhidas algumas tecnologias que lidam bem com a necessidade do projeto. Abaixo são listadas essas ferramentas/tecnologias.

- NotORM (https://www.notorm.com/) - biblioteca para geranciamento de mapeamento relacional e abstração de complexidade de acesso aos dados;
- Flight Micro Framework (http://flightphp.com/) - framework PHP para gerenciamento da API Rest.

## <a id="api" href="#">:link:</a> API
A funcionalidade da a API do Prosa tem a possibilidade de fornecer informações e interagir com a plataforma. A partir dela é possível acessar dados, gerar gráficos, inserir registros e outras funcionalidades que virão nas próximas versões. Abaixo está descrito as funcionalidades da API na versão atual. Todos os itens abaixo englobam os itens básico de um CRUD (_Create, Read, Update_ e _Delete_)

* Usuários - usuários dos sistema;
* Projetos - projetos são espaços onde os pontos de medição serão instalados;
 * Pontos de Medição - um ponto de medição pode ser compreendido como um ponto específico, dentro de um espaço (Projeto), onde um medidor será instalado para realizar medições da água (instalado no banheiro, na caixa d'água, na sisterna, etc);
 * Registros - são os registros realizados a cada ciclo, que mensura vazão de água, volume e outras informações sobre a qualidade da água.
 
### :gear: Usando a API
**ponto_medicao**

--------------

#### Apagar um ponto de medicão

**Método:** GET
```
/prosa/api/ponto_medicao/delete/{id}

```
**Retorno:** JSON
```
{
'status' : 'ok'
 }
```

-----------------------------

#### Listagem dos pontos de medição


**Método:** GET
```
/prosa/api/ponto_medicao/list
```
**Retorno:** JSON 
```
{
 'descricao' : 'string',
}
```
-----------------------------

#### Inserir um ponto de medição

**Método:** POST
```
/prosa/api/ponto_medicao/insert

```
**Campos:** 


Campo | Tipo | Limite
------------ | -------------| -------------
descricao | string | 45


**Retorno:** Status
```
{
'status' : 'ok'
 }
```

 ----------------------------


 **Registro**

--------------

#### Apagar Registro

**Método:** GET
```
/prosa/api/registro/delete/{id}

```

**Retorno:** JSON
```
{
'status' : 'ok'
 }
```

-----------------------------

#### Listagem de Registro

**Método:** GET
```
/prosa/api/registro/list

```
**Retorno:** JSON 
```
{
 'horario_inicial' : 'timestamp',
 'horario_final' : 'timestamp',
 'vazao' : 'bigint',
 'volume' : 'bigint',
}
```
-----------------------------


#### Inserir um Registro

**Método:** POST
```
/prosa/api/registro/insert

```
**Campos:** 


Campo | Tipo | Limite
------------ | -------------| -------------
horario_inicial | timestamp | -
horario_final   |  timestamp| -
vazao			| bigint	| 20
volume			| bigint	| 20


**Retorno:** Status
```
{
'status' : 'ok'
 }
```

 ----------------------------


 **Projeto**

--------------

#### Apagar Projeto

**Método:** GET
```
/prosa/api/projeto/delete/{id}

```
**Retorno:** JSON
```
{
'status' : 'ok'
 }

```

-----------------------------

#### Listagem de Projeto

**Método:** GET
```
/prosa/api/projeto/list
```
**Retorno:** JSON 
```
{
 'nome' : 'string',
 'endereco' : 'string',
 'descricao' : 'string',

}
```
-----------------------------


#### Inserir um Projeto

**Método:** POST
```
/prosa/api/projeto/insert

```
**Campos:** 


Campo | Tipo | Limite
------------ | -------------| -------------
nome | string | 30
endereco   |  string    | 50
descricao  |  string	| 50



**Retorno:** Status
```
{
'status' : 'ok'
 }
```

 ----------------------------


 **Usuários**

--------------

#### Apagar Usuário

**Método:** GET
```
/prosa/api/usuario/delete/{id}

```
**Retorno:** JSON
```
{
'status' : 'ok'
 }
```

-----------------------------

#### Listagem de Usuários

**Método:** GET
```
/prosa/api/usuario/list
```
**Retorno:** JSON 
```
{
 'nome' : 'string',
 'login' : 'string',
 'data_cadastro' : 'datetime',
}
```
-----------------------------


#### Inserir um Usuário

**Método:** POST
```
/prosa/api/usuario/insert

```
**Campos:** 


Campo | Tipo | Limite
------------ | -------------| -------------
nome | string | 30
login   |  string | 50
data_cadastro	| datetime	| -



**Retorno:** Status
```
{
'status' : 'ok'
 }

```
 ----------------------------
 

## <a id="contribuidores" href="#">:link:</a> Contribuidores

@cesimar @leilany000
