
# Pedidos-App

Projeto feito com objetivo de criar um CRUD com o tema controle de pedidos utilizando uma única tela para executar todas as ações.

## Requisitos
Necessário ter php e composer na máquina 

## Instalação

#### Clone o projeto no local desejado através do comando
``git clone https://github.com/August0ka/pedidos-app.git`` 

#### Mude para a pasta
``cd pedidos-app``

#### Instale o Sail 
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

#### Copie o conteúdo de .env.example para .env
```cp .env.example .env```

#### Valores padrão para conectar ao banco de dados local

connection = mysql\
host = localhost\
port = 3306\
database = laravel\
username = sail\
password = password


#### Suba os contêineres (Esse processo pode demorar um pouco)
``./vendor/bin/sail up -d``

#### Gere a key para o projeto
``./vendor/bin/sail artisan key:generate``

#### Execute as migrations
``./vendor/bin/sail artisan migrate``

## Documentação da API

#### Retorna todos os itens

```http
  GET /api/orders/consult
```

| Parâmetro   | 
| :---------- |
| `sem parâmetro` |

#### Cria um pedido

```http
  POST /api/orders/store
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `client_name`      | `string` | **Obrigatório**. Nome do cliente |
| `order_date`      | `datetime` | **Obrigatório**. Data que foi efetuado o pedido |
| `delivery_date`      | `datetime` | **Obrigatório**. Data que foi entregue o pedido |
| `status`      | `smallint` | **Obrigatório**. Status do pedido |

#### Valores do status

| Status   | Descrição           |
| :---------- | :---------- |
| `1` | Pendente        |
| `2` | Entregue        |
| `3` | Cancelado        |


#### Atualiza um pedido

```http
  PUT /api/orders/{orderId}/update
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `client_name`      | `string` | **Obrigatório**. Nome do cliente |
| `order_date`      | `datetime` | **Obrigatório**. Data que foi efetuado o pedido |
| `delivery_date`      | `datetime` | **Obrigatório**. Data que foi entregue o pedido |
| `status`      | `smallint` | **Obrigatório**. Status do pedido |

#### Delete um pedido

```http
  DELETE /api/orders/{orderId}/destroy
```

| Parâmetro   | 
| :---------- |
| `sem parâmetro` |
