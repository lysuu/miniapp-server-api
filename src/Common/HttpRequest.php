<?php
/**
 * Created by PhpStorm.
 * User: shoushou
 * Date: 2019-04-28
 * Time: 10:47
 */

namespace ServerApi\Common;


use GuzzleHttp\Client;

class HttpRequest
{
    /**
     * @var Client|null
     */
    private $_client = null;

    /**
     * @var null
     */
    public static $instance = null;

    /**
     * HttpRequest constructor.
     */
    private function __construct()
    {
        $this->_client = new Client();
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     *
     */
    private function __wakeup()
    {
    }

    /**
     * @return HttpRequest|null
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $uri
     * @param string $method
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function Request($uri, $method = 'POST', $options = [])
    {
        return $this->_client->request($method, $uri, $options);
    }

}
