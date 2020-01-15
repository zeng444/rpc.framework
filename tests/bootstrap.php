<?php

use \Janfish\Rpc\Server;

define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VENDOR_PATH', dirname(ROOT_PATH).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR);
define('RUNTIME_PATH', ROOT_PATH.'runtime'.DIRECTORY_SEPARATOR);
define('TEST_PATH', ROOT_PATH.'tests'.DIRECTORY_SEPARATOR);
define('LOG_PATH', ROOT_PATH.'logs'.DIRECTORY_SEPARATOR);

try {

    /**
     * Autoload Object
     */
    require_once VENDOR_PATH.'autoload.php';


    $env = isset($_ENV['SITE_ENV']) ? strtolower($_ENV['SITE_ENV']) : 'prod';

    /**
     * Include RPC configuration
     */
    $serverConfig = include ROOT_PATH."configs/rpc.php";

    /**
     * Include RPC services configuration
     */
    $servicesConfig = include ROOT_PATH."configs/services.php";

    /**
     * Include Autoloader
     */
    include_once ROOT_PATH.'configs/loader.php';

    /**
     * Include RPC services configuration
     */
    include_once ROOT_PATH.'configs/components.php';

    /**
     * Include UnitCase
     */
    include_once TEST_PATH.'UnitCase.php';

} catch (\Exception $e) {
    echo $e->getMessage().'<br>'.'<pre>'.$e->getTraceAsString().'</pre>';
}
