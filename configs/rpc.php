<?php
/**
 * Configuration for socket server
 */
return [
    'server' => [
        'host' => '0.0.0.0',
        'port' => 9501,
        'servicePrefix' => 'Services\\',
        'pid_file' => RUNTIME_PATH.'.server',
        'log_file' => LOG_PATH,
    ],
    'options' => [
        'daemonize' => 0,
        'reactor_num' => 2,
        'worker_num' => 2,
        'backlog' => 1000,
        'max_request' => 2000,
        'dispatch_mode' => 1,
        'log_file' => LOG_PATH.'logs.log',
    ],
];
