
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

Execute this command to run the built-in web server and access the application in your browser at https://localhost:8000/api

```bash
  symfony server:start
```


## API Reference

#### Get all events

```http
  GET /api/events
```

#### Get event

```http
  GET /api/events/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | Id of event to fetch |

#### Add event

```http
  POST /api/events
```

Example data :

```json
{
  "name": "string",
  "startDate": "2023-05-01T09:24:49.311Z",
  "endDate": "2023-05-01T09:24:49.311Z",
  "limitNumber": 10
}
````
Where **limitNumber** is the maximum of registration allowed for this event

#### Delete event

```http
  DELETE /api/events/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | Id of event to delete |


#### Update event

```http
  PUT /api/events/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | Id of event to update |

Example data :

```json
{
  "name": "string",
  "startDate": "2023-05-01T09:24:49.311Z",
  "endDate": "2023-05-01T09:24:49.311Z",
  "limitNumber": 8
}
````

#### Add registration

```http
  POST /api/registrations
```

Example data :

```json
{
  "firstname": "John",
  "lastname": "Doe",
  "email": "johndoe@mail.com",
  "phone": "+33222114550",
  "event": "/api/events/2"
}
````
Where **/api/events/2** is the URI to the event with id #2
