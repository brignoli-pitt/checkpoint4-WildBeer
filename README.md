## Requirements

- PHP 8.1
- Symfony 6.2

### Install the project

- Clone this project
- Run ``composer install``
- Run ``yarn install``
- Run ``yarn encore dev`` 

### Credentials

- Create ``.env.local`` from the ``.env`` file
- Comment line 32: DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"
- Add your credentials on line 33: DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"

### Database and migrations

- Run ``php bin/console doctrine:database:create``
- Run ``php bin/console doctrine:migrations:migrate``
- Run ``php bin/console doctrine:fixtures:load``

### Working

- Run ``symfony server:start`` to launch your local php web server
- Run ``yarn dev-server`` to launch your local server for assets (or yarn dev-server do the same with Hot Module Reload activated)


