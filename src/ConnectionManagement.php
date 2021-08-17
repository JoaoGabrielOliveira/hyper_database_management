<?php
namespace Hyper\Record;

use Hyper\Record\Connection\DatabaseConnection;
use Hyper\Record\Database;
use Hyper\Record\Connection\Drivers\PostgreSQLConnection;
use Hyper\Record\Connection\Drivers\SQLiteConnection;
use Hyper\Record\Operation\Operator;
use Hyper\Record\Operation\PostgreSQLOperations;

class ConnectionManagement
{
    private static Database $DATABASE;
    private static DatabaseConnection $driver;
    public static array $DriverList;

    public static function setDatabase($params)
    {
        if(isset($params['db']))
            $params = $params['db'];

        self::setDriver($params);

        self::$DATABASE = new Database(self::getDriver());
    }

    public static function setDriver($params)
    {
        self::$driver = self::$DriverList[$params['driver']];
        self::$driver->setByParams($params);
    }

    public static function getDriver()
    {
        return self::$driver;
    }

    public static function getDatabase():Database
    {
        return self::$DATABASE;
    }
}
?>