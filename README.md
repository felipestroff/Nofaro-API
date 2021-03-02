## Nofaro - API

## Requeriments

- Local web server (xampp, wamp, etc)
- Local MySQL/MariaDB database manager, example: https://www.heidisql.com/download.php
- Git https://git-scm.com/downloads
- PHP 7 https://windows.php.net/download#php-7.4 (if not included on web server)
- Composer https://getcomposer.org/download

- - - - -

## How to use

1. Install a web server and start apache and MySQL/MariaDB services
2. Install database manager and create database named `nofaro_api` on `utf8_general_ci` collation
3. Install Composer and set PHP executable dir, example: `C:\wamp64\bin\php\php7.4.0` or `C:\php`
4. Install GIT and clone app repository by terminal command (GIT bash or CMD): `git clone https://gitlab.com/fstroff/nofaro-api.git`
5. Rename `.env.example` file to `.env` inside of app dir
6. In app dir and run: `composer install`
7. Wait all process then run: `php artisan key:generate`
8. Enter in `.env` file and set `DB_DATABASE=` variable to `DB_DATABASE=nofaro_api`
9. Run: `php artisan migrate --seed` command to populate our local database
10. To reset database with data, run: `php artisan migrate:fresh --seed` command
11. Finally run `php artisan serve` to host Laravel app on localhost (port 8000): `localhost:8000`

- - - - -

## Migrations

To create or edit current data (seeds), enter on: `./database/migrations` app dir, apply edits, then run `php artisan migrate:fresh --seed` command to refresh datastore with new data, losing old ones.

- - - - -

## API

Pets:
1. GET: `api/pets/{id}` - show pet by provided id with related `specie` and `cares`
2. GET: `api/pets` - show all pets with related `specie` and `cares`
3. POST: `api/pets` - create new pet
4. DELETE: `api/pets/{id}` - delete pet by provided id deleting related `cares`
5. PUT: `api/pets/{id}` - update pet by provided id

Cares:
1. GET: `api/cares/{id}` - show care by provided id with related `pet`
2. GET: `api/cares` - show all cares with related `pet`
3. POST: `api/cares` - create new care
4. DELETE: `api/cares/{id}` - delete care by provided id
5. PUT: `api/cares/{id}` - update care by provided id
