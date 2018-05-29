# Requirements

* SQLite
* MySQL
* PHP ^7.1.3

# How to install

Clone the repository, then run composer

```bash
composer install
```

Once composer has finished, run artisan commands to migrate and seed the database

```bash
php artisan migrate && php artisan db:seed
```

Alternatively you can run the command below which run execute the SQL file provided

```bash
php artisan run:sql
```

To serve the application run

```bash
php artisan serve
```

Visit the provided ip from your terminal (usually 127.0.0.1:8000)
