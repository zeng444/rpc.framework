<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('memory_limit', '128M');

return new \Phalcon\Config([
    'logger' => [
        'file' => LOG_PATH.'debug.log',
        'rpc' => LOG_PATH.'rpc.log',
    ],
    'queue' => [
        "host" => "@@QUEUE_SERVER@@",
        "port" => "11300",
    ],
    'cache' => [
        'host' => '@@REDIS_SERVER@@',
        'port' => '@@REDIS_PORT@@',
        'persistent' => false,
        //      'auth'=>'root',
        'index' => 21,
        'lifetime' => 172800,
    ],
    'database' => [
        'adapter' => 'Mysql',
        'host' => '@@DB_SERVER@@',
        'port' => '@@DB_PORT@@',
        'username' => '@@DB_SERVER_USERNAME@@',
        'password' => '@@DB_SERVER_PASSWORD@@',
        'dbname' => '@@CALL_CENTER_DB_NAME@@',
        'charset' => 'utf8',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING,
        ],
    ],
    'middleware' => [
        'host' => '@@QUEUE_SERVER@@',
        'tube' => '@@QUEUE_TUBE@@',
        'workerNum' => '@@QUEUE_WORK_NUMBER@@',
        'reserveTimeout' => '@@QUEUE_WORK_RESERVE_TIMEOUT@@',
        'maxRequest' => 50000,
        'cron' => 100,
        'daemonize' => true,
        'pidFile' => RUNTIME_PATH.'async_task.pid',
        'logPath' => RUNTIME_PATH.'async.log',
    ],
]);
