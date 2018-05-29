# Requirements

* SQLite
* PHP ^7.1.3
* MySQL

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

*MySQL ONLY. SQLite will not work for this command*

Alternatively you can run the command below which run execute the SQL file provided

```bash
php artisan run:sql
```

To serve the application run

```bash
php artisan serve
```

Visit the provided IP address from your terminal (usually [127.0.0.1:8000](http://127.0.0.1:8000))

# API Documentation

## Create User

**URL:** /api/users

**Action:** POST

**Arguments:**

| Key | Type | Description |
|----|----|----|
| username | string | A string used to label a user |
| email | string | A valid email address following (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) |
| role | string | Must be one of the following: Admin, Publisher, Public User |


