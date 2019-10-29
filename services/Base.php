<?php

namespace Services;

use Janfish\Rpc\Server\Service\ServiceInterface;
use Phalcon\Di;
use Phalcon\DI\InjectionAwareInterface;
use Phalcon\DiInterface;

/**
 * Author:Robert
 *
 * Class ServiceBase
 * @package Core
 *
 * @property  \Phalcon\Db\Adapter $db
 */
abstract class Base implements InjectionAwareInterface, ServiceInterface
{

    /**
     * Author:Robert
     *
     * @var
     */
    protected $_di;

    /**
     * Author:Robert
     *
     * @var
     */
    protected $db;


    /**
     * Author:Robert
     *
     * @var
     */
    protected $config;

    /**
     * Base constructor.
     */
    public function __construct()
    {
        $this->setDi(Di::getDefault());
        $this->db = $this->getDi()->get('db');
        $this->config = $this->getDi()->get('config');
    }

    /**
     * db helper
     */
    //    public function init(\Swoole\Server $server)
    //    {
    //
    //    }


    /**
     * @param DiInterface $di
     */
    public function setDi(DiInterface $di)
    {
        $this->_di = $di;
    }

    /**
     * @return mixed
     */
    public function getDi()
    {
        return $this->_di;
    }
}
