Rodar o comando "composer install" para instalar as dependências do projeto;
Executar o comando "cp .env.example .env" para criar o arquivo de configurações;
Criar uma nova base no DB;
Preencher os dados de acesso a base no arquivo .env, criado anteriormente, onde: 
    DB_CONNECTION: deve conter o nome do DB (sqlite, mysql, pgsql ou sqlsrv)
    DB_HOST: ip do DB
    DB_PORT: porta de acesso ao DB
    DB_DATABASE: nome da base criada
    DB_USERNAME: nome do usuário para conectar ao DB
    DB_PASSWORD: senha de conexão ao DB
Rodar o comando php artisan migrate na pasta raíz do projeto para popular o banco de dados com as tabelas necessárias;
Para inserir um usuário de exemplo, rode o comando php artisan db:seed.