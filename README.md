# React-material-table-CRUD

React-material-table-CRUD is a Laravel RESTful API for [React](../README.md) React-table-pagination project.

## Installation

Make copy of .env.example file and rename it to .env and setup database config :

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tabledata
DB_USERNAME=user
DB_PASSWORD=pass
```
Create new database, in this case tabledata.

Install dependencies with :

```bash
composer install
```

Create database tables :

```bash
php artisan migrate
```

To seed your database, you may use the db:seed command on the Artisan CLI:

```bash
php artisan db:seed
```
And finnaly run you server :

```bash
php artisan serve
```

And your API server is running!

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
