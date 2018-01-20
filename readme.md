

 1. Rodar o comando `composer install` para instalar as dependências do projeto;
 2. Executar o comando "cp .env.example .env" para criar o  arquivo de configurações; 
 3. Criar uma nova base no DB; 
 4. Preencher os  dados de acesso a base no arquivo .env, criado anteriormente, onde:
	   
		DB_CONNECTION: Deve conter o nome do DB (sqlite, mysql, pgsql ou sqlsrv)
	    DB_HOST: IP do Banco de dados;
	    DB_PORT: Porta de acesso ao banco;
	    DB_DATABASE: Nome da base criada;
	    DB_USERNAME: Nome do usuário para conectar ao DB
	    DB_PASSWORD: senha de conexão ao DB
 5. Executar o comando `php artisan migrate` na pasta raíz do projeto   para popular o banco de dados com as tabelas necessárias para o funcionamento da aplicação;
 6. Para inserir um usuário de exemplo, execute o comando `php artisan db:seed`.
