## Laravel 9 - Dashboard Test.
<h4>Dashboard em laravel que conta com permissões, confira as features abaixo.</h4>

![](https://i.imgur.com/Gh0vZoD.png)
![](https://i.imgur.com/EiVx2TL.png)
![](https://i.imgur.com/86we5JD.png)

## Features

-   [x] Login
-   [x] Crud - Produtos
-   [x] Crud - Categorias
-   [x] Crud - Marcas
-   [x] Crud - Permissões
-   [x] Crud - Usuários

Pré-requisitos.: PHP: >= 8.0.2 e composer ^2.3.5

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

Pacotes Laravel
```Bash
composer install
```
Banco de Dados ( Tabelas )

```bash
php artisan migrate
```

Banco de Dados ( População de tabelas )

```bash
php artisan migrate --seed
```
Iniciando Laravel

```bash
php artisan serve
```

Iniciando NPM ( Nescessário para os assets )

```bash
npm run dev
```
## Usuários
```bash
Email: admin@test.com
Senha: admin@test.com
```
```bash
Email: comum@test.com
Senha: comum@test.com
```
