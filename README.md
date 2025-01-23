## Teste - Conecta Lá

API Restful com endpoints para Cadastrar, Recuperar, Editar, Listar e Excluir um Usuário.

# Observação: É necessário ter instalado previamente no ambiente local as tecnologias listadas abaixo:
* PHP
* Laravel Framework
* Mysql

```
# clonando Repositório de codigo-fonte
-- Entar no diretorio onde o desenvolvedor irá trabalhar
-- Clonar o repositório abaixo:

# git clone https://github.com/Gabrigels/teste-conecta-la.git
```
# Configuracão do Laravel

```
# Rodar os comandos no terminal

--composer install

--php artisan key:generate

--php artisan migrate

```

# Configuracão do Mysql

```
# Colocar no arquivo .env do Laravel as credenciais do Banco de Dados Mysql Local conforme exemplo abaixo:
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=conecta_la
DB_USERNAME=usuario
DB_PASSWORD=Conectala@2025
```

# Testes unitários

```
# Para rodar os teste unitários basta rodar o comando abaixo:

--php artisan test
```
