## Inventory-Management-System
_**This application develop by Laravel and vue js. It's User token base authentication (JWT auth)**_ 

#### Downloading composer package and dumping
~~~bash
composer install
or 
composer update
~~~

### Copy code from `.env.example` to `.env` file

#### Configure project
~~~php
php artisan cache:clear
php artisan config:cache
php artisan key:generate
composer dump-autoload
~~~

#### Storage folder link
~~~php
php artisan storage:link
~~~

### Create a database name and change credential in `.env` file

### migrate and seed database
~~~bash
php artisan migrate --seed
~~~

#### Downloading npm packages
~~~bash
npm install
~~~

### Serving laravel project
~~~
php artisan serve
npm run dev
npm run watch
~~~
