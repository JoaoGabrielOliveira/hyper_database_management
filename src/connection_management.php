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
    private static DatabaseConnection $_driver;

    public static function setDatabase($params)
    {
        if(isset($params['db']))
            $params = $params['db'];

        self::setDriver($params);

        self::$DATABASE = new Database(self::getDriver());
    }

    public static function setDriver($params)
    {
        switch($params['driver'])
        {
            case 'psql':
                self::$_driver = new PostgreSQLConnection($params);
            break;

            case 'sqlite':
                self::$_driver = new SQLiteConnection($params);
            break;
        }
    }

    public static function getDriver()
    {
        return self::$_driver;
    }

    public static function getDatabase():Database
    {
        return self::$DATABASE;
    }
}
?>