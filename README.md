
# Event Management - REST API with Syfmony

An API to manage events allowing to add / remove / update Events and to registration to the events.




## Requirements

- PHP 7.2.5 or higher
- Postgresql database
- PDO-pgSQL PHP extension enabled


## Installation

Execute the commands bellow to install the project:

```bash
  git clone https://github.com/lackynasta/event-api.git
  cd event-api
  composer install
```
    
## Database and migration

Change the database parameters in .env file according to your database

`DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"`

Execute the commands below :
```bash
  php bin/console doctrine:database:create
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
```
    
## Run the API

Execute this command to run the built-in web server and access the application in your browser at https://localhost:8000

```bash
  symfony server:start
```

