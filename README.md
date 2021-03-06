# User CRUD API

![Sample](https://raw.githubusercontent.com/patoui/user-crud-api/master/sample.png)

# Requirements

* SQLite
* MySQL
* PHP ^7.1.3
* Composer
* Additional [Laravel Server Requirements](https://laravel.com/docs/5.6/installation#server-requirements)

# How to install

Clone the repository

```bash
git clone https://github.com/patoui/user-crud-api.git
```

Change to the project directory

```bash
cd user-crud-api
```

Run composer

```bash
composer install
```

To verify build integrity, run the tests

```bash
vendor/bin/phpunit
```

Setting up the database requires you to update your `.env` values. By default SQLite is chosen as the default driver. You may change this to your desired driver, here's an example of MySQL configuration:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_crud_api
DB_USERNAME=root
DB_PASSWORD=
```

After you're finished with your configuration create the database (in the example it's `user_crud_api`, if you're using SQLite the file should already be in the `database` directory), run artisan commands to migrate and seed the database (those using the default SQLite may need to adjust the file permissions for unix/linux run `sudo chmod 777 database/database.sqlite`)

```bash
php artisan migrate && php artisan db:seed
```

Alternatively you can run the command below which run execute the SQL file provided (`seed-db.sql`)

```bash
php artisan run:sql
```
*NOTE: The above command will only work for MySQL. SQLite will not work.*

To serve the application run

```bash
php artisan serve
```

Visit the provided IP address from your terminal (usually [127.0.0.1:8000](http://127.0.0.1:8000))

*If you get an error that says "Missing BC Math or GMP extension" make sure one of them is enabled in your php.ini*

# API Documentation

## Create User

### Request

**URL:** /api/users

**Action:** POST

**Required Headers:**

| Key | Value |
|----|----|
| Accept | application/json |
| Content-Type | application/json |

**Arguments:**

| Key | Type | Rules | Description |
|----|----|----|----|
| username | string | required | The user's name label |
| email | string | required, email (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) | The user's email address |
| role | string | required, must be one of: Admin, Publisher, Public User | The user's role |

### Response

**Status:** 201

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | The user's name label |
| email | string | The user's email address |
| role | string | The user's role |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format example: December 22nd 10:59 AM) |

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

### Failed Response

**Status:** 422

**Content-Type:** application/json

**Sample Response**

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "role": [
            "The role field is required."
        ],
        "username": [
            "The username field is required."
        ],
        "email": [
            "The email field is required."
        ]
    }
}
```

## Read User

### Request

**URL:** /api/users/{id}

**Action:** GET

**Parameters**

| Key | Type | Rules | Description |
|----|----|----|----|
| id | string | Required in url | Unique string to identify a user |

### Response

**Status:** 200

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | The user's name label |
| email | string | The user's email address |
| role | string | The user's role |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format example: December 22nd 10:59 AM) |

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

## Update User

### Request

**URL:** /api/users/{id}

**Action:** PUT

**Required Headers:**

| Key | Value |
|----|----|
| Accept | application/json |
| Content-Type | application/json |

**Parameters**

| Key | Type | Rules | Description |
|----|----|----|----|
| id | string | Required in url | Unique string to identify a user |

**Arguments:**

| Key | Type | Rules | Description |
|----|----|----|----|
| username | string | required | The user's name label |
| email | string | required, email (valid per [RFC 822](https://www.ietf.org/rfc/rfc822.txt)) | The user's email address |
| role | string | required, must be one of: Admin, Publisher, Public User | The user's role |

### Response

**Status:** 200

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | The user's name label |
| email | string | The user's email address |
| role | string | The user's role |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format example: December 22nd 10:59 AM) |

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
### Failed Response

**Status:** 422

**Content-Type:** application/json

**Sample Response**

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "role": [
            "The role field is required."
        ],
        "username": [
            "The username field is required."
        ],
        "email": [
            "The email field is required."
        ]
    }
}
```

## Delete User

### Request

**URL:** /api/users/{id}

**Action:** DELETE

**Parameters**

| Key | Type | Rules | Description |
|----|----|----|----|
| id | string | Required in url | Unique string to identify a user |

### Response

**Status:** 204

**Content-Type:** text/html

**Sample Response (EMPTY)**

```json
```

## List Users

### Request

**URL:** /api/users

**Action:** GET

### Response

**Status:** 200

**Content-Type:** application/json

| Key | Type | Description |
|----|----|----|
| id | string | Unique string to identify a user |
| username | string | The user's name label |
| email | string | The user's email address |
| role | string | The user's role |
| created_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| updated_at | string | UTC datetime string (format example: 2017-12-22 22:59:59) |
| short_updated_at | string | America/Toronto datetime string (format example: December 22nd 10:59 AM) |

**Sample Response**

```json
[
    {
        "id": "ypazj",
        "username": "New Admin",
        "email": "new-admin@test.com",
        "role": "Admin",
        "created_at": "2017-12-22 22:59:59",
        "updated_at": "2017-12-22 22:59:59",
        "short_updated_at": "December 22nd 10:59 AM"
    },
    {
        "id": "npdvp",
        "username": "New Publisher",
        "email": "new-publisher@test.com",
        "role": "Publisher",
        "created_at": "2017-12-22 23:00:00",
        "updated_at": "2017-12-22 23:00:00",
        "short_updated_at": "December 22nd 11:00 AM"
    }
]
```

