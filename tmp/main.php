<?php
require '../vendor/autoload.php';
        //array_search($driver, self::$DriverList);
        //throw new Exception("");

use Hyper\Record\Connection\Drivers\PostgreSQLConnection;
use Hyper\Record\Connection\Drivers\SQLiteConnection;
use Hyper\Record\ConnectionManagement;

ConnectionManagement::$DriverList = [
    'pgsql' => new PostgreSQLConnection(),
    'sqlite' => new SQLiteConnection(),
]

?>