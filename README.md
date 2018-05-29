# Requirements

* SQLite
* PHP ^7.1.3

# How to install

Clone the repository, then run composer

```bash
composer install
```

To verify build integrity run the tests

```bash
vendor/bin/phpunit
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

Visit the provided IP address from your terminal (usually [127.0.0.1:8000](http://127.0.0.1:8000))
