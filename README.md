## Sobre a aplicação

Se trata de um Middleware em Laravel que se conecta com endpoints REST descrevendo problemas, componentes, usuários e registros de tempo, de modo a apresentar
resumos JSON desses dados em um formato compactado.

### Endpoints de consumo

- **(https://my-json-server.typicode.com/bomoko/algm_assessment/issues)**
- **(https://my-json-server.typicode.com/bomoko/algm_assessment/components)**
- **(https://my-json-server.typicode.com/bomoko/algm_assessment/timelogs)**
- **(https://my-json-server.typicode.com/bomoko/algm_assessment/users)**

## Ferramentas utilizadas

O foco dessa aplicação foi a utilização do Laravel 8.0 bem estruturado em classes com responsabilidades unicas PHP 7.4 e banco de dados postgres.  

## Instalação do sistema no ambiente local

Criar um banco de dados postgres com as seguintes comfigurações

**DB_CONNECTION=pgsql**
**DB_HOST=127.0.0.1**
**DB_PORT=5433**
**DB_DATABASE=timelog** 
**DB_USERNAME=postgres**
**DB_PASSWORD=postgres**

Fazer clone do projeto e fazer pull do branch master

Executar o comando composer install na pasta principal do projeto para carregar as dependencias 

Criar um arquivo .env igual o arquivo .env.example

Após isso é necessário rodar o comando para criar as tabelas no banco de dados

**php artisan migrate**

## Modo de utilização
O projeto é basicamento divido em 2 etapas:

A primeira etapa é o carregamento de informações para preenchimento das tabelas a partir dos endpoints. Para realizar esse processo é necessário rodar o comando abaixo:

**php artisan populate:objects**

A segunda etapa é o retorno dessas informações de forma reduzida. Para isso foram criados 2 endpoints externos (no bloco api) e internos (no bloco routes).

API externa (Pode ser utilizada pelo navegador para testes):
localhost:portaDoServidor/api/component-metadata
localhost:portaDoServidor/api/user-timelogs

As rotas internas são usadas para testes internos usando o comando abaix:

**phpunit tests\Unit\APITest.php**


## Considerações Finais

Projeto destinado para estudos e aprimoramentos em alguns quesitos do Laravel como seus comands e a utilização de classes com responsabilidades unicas.
