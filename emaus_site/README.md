# Grupo de Jovens Emaús

Site institucional + área administrativa do **Grupo de Jovens Emaús** da Paróquia Nossa Senhora da Guia.

## Requisitos

- PHP 8.4+
- Composer
- MySQL 8.0+
- Node.js 22+

## Instalação

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=emaus
DB_USERNAME=usuário
DB_PASSWORD=sua_senha
```

```bash
php artisan migrate
php artisan db:seed --class=UserSeeder  # se disponível
php artisan storage:link
npm run build
```

## Funcionalidades

- **Página inicial** — Hero com versículo, recados (grupo/paróquia), reuniões, eventos futuros, liturgia diária, galeria de fotos
- **Admin** — Dashboard, CRUD de galerias/fotos, reuniões, eventos, recados, leitura do dia

## Utilitários

```bash
# Criar um novo usuário admin
php artisan user:create

# Criar passando valores diretamente
php artisan user:create "Nome" "email@email.com" "senha"

# Atualizar email e/ou senha do usuário admin
php artisan user:update

# Ou passando os valores diretamente:
php artisan user:update "novo@email.com" "nova-senha"
```

## Desenvolvimento

```bash
npm run dev     # build dos assets (Vite)
php artisan serve   # servidor em localhost:8000
```

## Projeto de Extensão

Projeto acadêmico desenvolvido como parte de atividades de extensão universitária.
