# Test R4 Marketing Digital

## Discritivo do test

Backend: Laravel
Front: Vue.js
Banco: MySQL (utilizando migrations)

* Tela de autenticação (Login/Senha) -- não precisa crud, somente estrutura no banco
* Categorias (ID/Nome/Imagem) -- não precisa crud, somente estrutura no banco
* CRUD Produtos (Id, IdCateg, Nome, Imagem)
* API com os métodos get, post, put, delete, padrao REST

* Subir ambiente para navegação no Heroku ou outro ambiente desejável

subir para github e nos enviar repositório.

## Instalação

### Requisitos

* PHP >= 8.1.2
* Composer >= 2.2.6
* Docker >= 20.10.21
* Docker Compose >= 1.29.2
* Laravel 9

### Executando o projeto

* Clone o projeto para sua máquina
* Execute o comando `composer install`
* Execute o comando `cp .env.example .env`
* Execute o comando `./vendor/bin/sail up -d`
* Execute o comando `./vendor/bin/sail php artisan key:generate`
* Execute o comando `./vendor/bin/sail php artisan migrate:fresh --seed`

### Acessando o projeto

* Acesse o projeto em `http://localhost`

### Credenciais para login

* E-mail: `joeh.doe@test.com`
* Senha: `password`

