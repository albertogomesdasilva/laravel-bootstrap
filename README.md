.env

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=celke_machines
DB_USERNAME=root
DB_PASSWORD=123456


package.json

{
    "private": true,
    "scripts": {
        "dev": "vite",
        "build": "vite build"
    },
    "devDependencies": {
        "@popperjs/core": "^2.11.6",
        "axios": "^0.27",
        "bootstrap": "^5.2.3",
        "laravel-vite-plugin": "^0.7.2",
        "lodash": "^4.17.19",
        "postcss": "^8.1.14",
        "sass": "^1.56.1",
        "vite": "^4.0.0"
    },
    "dependencies": {
        "jquery": "^3.6.3"
    }
}

**** ROUTES 
ROTAS
web.php
<?php

use \App\Http\Controllers\MachinesController;
use \App\Http\Controllers\NovaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/', [MachinesController::class, 'index'])->middleware('auth');

Route::get('/listar-maquinas', [MachinesController::class, 'index'])->middleware('auth');
Route::get('/listar-nova', [NovaController::class, 'index'])->middleware('auth');
Route::get('/visualizar-maquina/{id}', [MachinesController::class, 'show'])->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
****************************



/ ******************************************

BOOTSTRAP NO LARAVEL

1. >composer require laravel/ui 

2. >php artisan ui bootstrap

3. >npm install

npm run dev




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    @vite(['resources/sass/app.scss','resources/js/app.js' ])
    
</head>

OOTSTRAP NO LARAVEL

1. >composer require laravel/ui 

2. >php artisan ui bootstrap

3. >npm install

npm run dev

cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000



### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list


###
 php artisan ui bootstrap --auth (bootstrap ou react ou vue)
 
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    @vite(['resources/sass/app.scss','resources/js/app.js' ])
    
</head>


### CRIANDO LARAVEL COM INÉRTIA E VUE ##################

>composer create-project laravel/laravel projeto-inertia-vue

>>configurar o arquivo .env e criar o banco de dados

>php artisan migrate

>composer require laravel/breeze --dev

>php artisan breeze:install vue --ssr

>php artisan make:model Carro -m (Cria a Model - no singular - e a Migration - no plural)-> Neste caso não precisa colocar protected $table = 'carros'

>php artisan make:migration create_testando_table

 */create_testando_table.php

    public function up()
    {
        Schema::create('testando', function (Blueprint $table) {
            $table->id();
            $table->string('string');
            $table->integer('integer');
            $table->decimal('decimal');
            $table->boolean('boolean');
            $table->enum('enum', ['opcao_1', 'opcao_2', 'opcao_3']);
            $table->timestamps();
        });
    }

>php artisan migrate

>php artisan make:model Testando

>Testando.php
class Testando extends Model
{
    use HasFactory;

    protected $table = 'testando';

    protected $fillable = [
        'string', 'integer', 'decima', 'boolean', 'enum'
    ];
}

>php artisan tinker

> use App\Models\Testando;                                                              
> Testando::all();                                                                      
= Illuminate\Database\Eloquent\Collection {#3747
    all: [
      App\Models\Testando {#3749
        id: 1,
        string: "isso é uma string",
        integer: 52,
        decimal: "2.50",
        boolean: 1,
        enum: "opcao_1",
        created_at: "2022-12-15 14:33:59",
        updated_at: null,
      },
    ],
  }

> Testando::create(['string' => 'Criando através da Model', 'integer'=> 25, 'decimal'=>5,5, 'b
oolean' => 1, 'enum' => 'opcao_3']);                

    
> $variavel = Testando::find(1);

> $variavel -> update(['string'=>'Atualizado']); 

>> $variavel                                                                                   
= App\Models\Testando {#3745
    id: 1,
    string: "Estou Atualizado",
    integer: 52,
    decimal: "2.50",
    boolean: 1,
    enum: "opcao_1",
    created_at: "2022-12-15 14:33:59",
    updated_at: "2022-12-15 18:04:10",
  }
  >> $variavel->delete();                                                                        
= true

/**** */
// RELACIONAMENTOS

>php artisan make:migration create_relacionamento_table


 public function up()
    {
        Schema::create('relacionamento', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('id_testando');
            $table->timestamps();

            $table->foreign('id_testando')->references('id')->on('testando');
        });
    }

>php artisan migrate

>php artisan make:mode Relacionamento

>Relacionamento.php:
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    use HasFactory;

    protected $table = 'relacionamento';

    protected $fillable = [
        'nome', 'id_testando'
    ];
}

>php artisan tinker
use App\Models\Relacionamento
Relacionamento::create(['nome' => 'Testando relacionamento', 'id_testando' => 2]);









/****************************************************** */

https://github.com/inertiajs/pingcrm

https://dashboard.kiwify.com.br/course/65fe7cb0-9e36-4a29-9e11-b455e9b09d10?lesson=d599f3e0-c447-4ecd-9064-1f281d0e58fe

carregando telas no navegador

Instalação
Clone o repositório localmente:

* git clone https://github.com/inertiajs/pingcrm.git pingcrm
cd pingcrm
Instale as dependências do PHP:

* composer install
Instale as dependências do NPM:

* npm ci
Construir ativos:

* npm run dev
Configuração de instalação:

* cp .env.example .env
Gerar chave de aplicativo:

* php artisan key:generate
Crie um banco de dados SQLite. Você também pode usar outro banco de dados (MySQL, Postgres), basta atualizar sua configuração de acordo.

* touch database/database.sqlite
Execute migrações de banco de dados:

* php artisan migrate
Execute o seeder do banco de dados:

* php artisan db:seed
Execute o servidor dev (a saída fornecerá o endereço):

### php artisan serve
Você está pronto para ir! Visite o Ping CRM em seu navegador e faça o login com:

Nome de usuário: johndoe@example.com
Senha: secreta

Executando testes
### Para executar os testes Ping CRM, execute:

* phpunit

/******************************************* */


https://github.com/inertiajs/pingcrm

https://dashboard.kiwify.com.br/course/65fe7cb0-9e36-4a29-9e11-b455e9b09d10?lesson=d599f3e0-c447-4ecd-9064-1f281d0e58fe

carregando telas no navegador

Instalação
Clone o repositório localmente:

* git clone https://github.com/inertiajs/pingcrm.git pingcrm
cd pingcrm
Instale as dependências do PHP:

* composer install
Instale as dependências do NPM:

* npm ci
Construir ativos:

* npm run dev
Configuração de instalação:

* cp .env.example .env
Gerar chave de aplicativo:

* php artisan key:generate
Crie um banco de dados SQLite. Você também pode usar outro banco de dados (MySQL, Postgres), basta atualizar sua configuração de acordo.

* touch database/database.sqlite
Execute migrações de banco de dados:

* php artisan migrate
Execute o seeder do banco de dados:

* php artisan db:seed
Execute o servidor dev (a saída fornecerá o endereço):

### php artisan serve
Você está pronto para ir! Visite o Ping CRM em seu navegador e faça o login com:

Nome de usuário: johndoe@example.com
Senha: secreta

Executando testes
### Para executar os testes Ping CRM, execute:

* phpunit

# Ping CRM

A demo application to illustrate how Inertia.js works.

![](https://raw.githubusercontent.com/inertiajs/pingcrm/master/screenshot.png)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/inertiajs/pingcrm.git pingcrm
cd pingcrm
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Ping CRM in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** secret

## Running tests

To run the Ping CRM tests, run:

```
phpunit
```
/*********************************************************** */
PROJETO PINGCRM LARAVEL/INERTIA/VUE
>composer create-project laravel/laravel projeto-laravel-inertia-vue

>composer require laravel/breeze --dev

>php artisan breeze:install vue --ssr (--SSR -> Server Side Render: as páginas são construídas no servidor)

>php artisan migrate

>php artisan serve

https://github.com/inertiajs/pingcrm.git (PROJETO PRONTO)

composer install
npm ci
npm install
npm run dev || npm run watch
.env
php artisan key:generate


************************************************



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
