<?php
/**
 * Created by PhpStorm.
 * User: shoushou
 * Date: 2019-05-14
 * Time: 17:50
 */

namespace ServerApi;

use ServerApi\Common\WeChat;

/**
 * 获取token相关接口
 *
 * Class Token
 * @package ServerApi
 */
class Token extends WeChat
{
    /**
     * 获取access_token接口地址
     */
    const GET_ACCESS_TOKEN_URL = '%s/cgi-bin/token?appid=%s&grant_type=%s&secret=%s';

    /**
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken(array $options)
    {
        $options['grant_type'] = $options['grant_type'] ?? 'client_credential';
        ksort($options);
        array_unshift($options, $this->wxApiHost);
        $uri = vsprintf(self::GET_ACCESS_TOKEN_URL, $options);
        array_shift($options);

        return $this->Request($uri, 'GET', $options);
    }

}
