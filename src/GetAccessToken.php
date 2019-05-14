<?php
/**
 * Created by PhpStorm.
 * User: shoushou
 * Date: 2019-05-14
 * Time: 17:50
 */

namespace ServerApi;

use ServerApi\Common\HttpRequest;
use ServerApi\Common\WeChat;

class GetAccessToken extends WeChat
{
    /**
     * 获取access_token接口地址
     */
    const GET_ACCESS_TOKEN_URL = '%stoken?appid=%s&grant_type=%s&secret=%s';

    /**
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken(array $options)
    {
        if (empty($options['appid']) || empty($options['secret'])) {
            die('Appid或Secret配置错误');
        }
        $options['grant_type'] = $options['grant_type'] ?? 'client_credential';
        ksort($options);
        array_unshift($options, $this->wxApiHost);
        $uri = vsprintf(self::GET_ACCESS_TOKEN_URL, $options);

        $response = HttpRequest::getInstance()->Request($uri, 'GET');
        return $response->getBody()->getContents();
    }

}
