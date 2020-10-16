<?php
/**
 * Created by PhpStorm.
 * User: shoushou
 * Date: 2019-05-14
 * Time: 17:53
 */

namespace ServerApi\Common;

class WeChat
{
    /**
     * 小程序服务端接口域名
     * @var string
     */
    protected $wxApiHost = 'https://api.weixin.qq.com';

    /**
     * @param string $uri
     * @param string $method
     * @param array $options
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function Request(string $uri, string $method = 'POST', array $options = [])
    {
        return HttpRequest::getInstance()->Request($uri, $method, $options)
            ->getBody()->getContents();
    }

}
