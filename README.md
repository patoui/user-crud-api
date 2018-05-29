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

### Request

**URL:** /api/users

**Action:** POST

**Arguments:**

| Key | Type | Description |
|----|----|----|
| username | string | A string used to label a user |
| email | string | A valid email address following (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) |
| role | string | Must be one of the following: Admin, Publisher, Public User |

### Response

**Status:** 201

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | A string used to label a user |
| email | string | A valid email address following (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) |
| role | string | Must be one of the following: Admin, Publisher, Public User |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format: F jS g:i A in example: December 22nd 10:59 AM) |

**Sample Response**

```json
{
    "id": "ypazj",
    "username": "New Admin",
    "email": "new-admin@test.com",
    "role": "Admin",
    "created_at": "2017-12-22 22:59:59",
    "updated_at": "2017-12-22 22:59:59",
    "short_updated_at": "December 22nd 10:59 AM"
}
```

## Read User

### Request

**URL:** /api/users/{id}

**Action:** GET

### Response

**Status:** 200

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | A string used to label a user |
| email | string | A valid email address following (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) |
| role | string | Must be one of the following: Admin, Publisher, Public User |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format: F jS g:i A in example: December 22nd 10:59 AM) |

**Sample Response**

```json
{
    "id": "ypazj",
    "username": "New Admin",
    "email": "new-admin@test.com",
    "role": "Admin",
    "created_at": "2017-12-22 22:59:59",
    "updated_at": "2017-12-22 22:59:59",
    "short_updated_at": "December 22nd 10:59 AM"
}
```
