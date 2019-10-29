<?php

define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('RUNTIME_PATH', ROOT_PATH.'runtime'.DIRECTORY_SEPARATOR);
define('LOG_PATH', ROOT_PATH.'logs'.DIRECTORY_SEPARATOR);

use  Janfish\Phalcon\AsyncCaller\Server as MiddlewareServer;

try {


    /**
     * Autoload Object
     */
    require_once ROOT_PATH.'vendor/autoload.php';


    $env = isset($_ENV['SITE_ENV']) ? strtolower($_ENV['SITE_ENV']) : 'prod';

    /**
     * Include RPC configuration
     */
    $serverConfig = include ROOT_PATH."configs/rpc.php";

    /**
     * Include RPC services configuration
     */
    $servicesConfig = include ROOT_PATH."configs/services.php";;
    /**
     * Autoload Object
     */
    include ROOT_PATH.'configs/loader.php';

    /**
     * Include RPC services configuration
     */
    include ROOT_PATH.'configs/components.php';


    if (!isset($config->middleware)) {
        throw new Exception('请先配置服务');
    }
      
    $middleware = new MiddlewareServer($config->middleware->toArray());
    $command = $argv[1] ?? 'start';
    if (!method_exists($middleware, $command)) {
        throw new Exception('不存在的指令');
    }
    $middleware->$command();


} catch (\Exception $e) {
    $errorMsg = $e->getMessage().'<br>'.'<pre>'.$e->getTraceAsString().'</pre>';
    if ($env === 'dev') {
        echo $errorMsg;
    } else {
        error_log('['.date('Y-m-d H:i:s').']'.$errorMsg, 3, LOG_PATH.'exception.log');
    }
}
