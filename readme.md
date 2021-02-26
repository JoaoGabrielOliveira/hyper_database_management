# Database Management

## Getting Started

The first thing you need the do is set the ````Database```` using the function ````setDatabase````.

````php
ConnectionManagement::setDatabase([
'db' => [
    "driver" => "psql",
    "host" => "localhost",
    "port" => "8080",
    "dbname" => "clients_db",
    "user" => "root",
    "password" => "1234",
]
]);
````

Another example:

````php
ConnectionManagement::setDatabase([
    'db' => [
        "driver" => "sqlite",
        "path" => __DIR__ . "/db/database.db"
]
]);
````
## Execute querys

```php
OperationManagement::execute("SELECT * FROM movies");
OperationManagement::feat("SELECT * FROM movies");
OperationManagement::featAll("SELECT * FROM movies");
```