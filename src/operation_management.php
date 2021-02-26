<?php
namespace Hyper\Record;

use Hyper\Record\Connection\Drivers\PostgreSQLConnection;
use Hyper\Record\ConnectionManagement;
use Hyper\Record\Operation\Operator;
use Hyper\Record\Operation\PostgreSQLOperations;
use Hyper\Record\Operation\SQLiteOperations;

class OperationManagement
{
    public static function execute(string $query,...$params)
    {
        return self::getCorrectOperator()->execute($query,...$params);
    }

    public static function feat(string $query,...$params)
    {
        return self::getCorrectOperator()->feat($query,...$params);
    }

    public static function featAll(string $query, ...$params)
    {
        return self::getCorrectOperator()->featAll($query, ...$params);
    }

    public static function getCorrectOperator():Operator
    {
        switch(ConnectionManagement::getDriver()::class)
        {
            case PostgreSQLConnection::class :
                return new PostgreSQLOperations(ConnectionManagement::getDatabase());
            break;

            case SQLiteOperations::class :
                return new PostgreSQLOperations(ConnectionManagement::getDatabase());
            break;

            default:
                return new Operator(ConnectionManagement::getDatabase());
            break;
        }
    }
}

?>