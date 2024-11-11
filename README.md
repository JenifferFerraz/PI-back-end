Instale as dependências do backend:

composer install

Instale as dependências do frontend:
npm install

Configuração do Projeto
Configure o arquivo .env:

Ajuste o arquivo .env com suas credenciais do banco de dados e outras configurações necessárias.

Gere a chave de aplicativo:

php artisan key:generate

Execute as migrações:

php artisan migrate

Execute o Seed:
php artisan db:seed --class=QuestionsSeeder

Execução do Projeto
Inicie o servidor backend:

php artisan serve

Inicie o servidor frontend:

npm run dev
