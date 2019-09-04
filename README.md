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
 
 

## <a id="contribuidores" href="#">:link:</a> Contribuidores
