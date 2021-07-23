## Blog

## Requirements

•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>
•	MySQL/MariaDB <br>


## Usage 

Setting up your development environment on your local machine: 

```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan serve
```

## App Configurations

Create a database 

```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_app
DB_USERNAME=[USERNAME]
DB_PASSWORD=[PASSWORD]
```

Migrate the tables
```
php artisan migrate
```


