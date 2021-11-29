<?php

namespace littlemo\weibo;

use littlemo\utils\HttpClient;
use littlemo\utils\Common;
use littlemo\weibo\Base;

/**
 * TODO 微博 JS SDK 2020 使用权限签名算法
 *
 * @author sxd
 * @Date 2019-07-25 10:43
 */
class Jsapi extends Base
{

    /**
     * 获得jsapi_ticket
     * 
     * 文档：https://open.weibo.com/wiki/Weibo-JS_V2
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-04
     * @version 2021-11-04
     * @return array
     */
    public function ticket()
    {

        $url = "https://api.weibo.com/oauth2/js_ticket/generate";
        $params = [
            "client_id" =>  $this->client_id,
            "client_secret" =>  $this->client_secret,
        ];
        return $this->init_result((new HttpClient())->post($url, [], $params), 'result', true);
    }

    /**
     * 签名算法
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-04
     * @version 2021-11-04
     * @param string $jsapi_ticket  网页用于调用微博客户端内JS接口的临时票据
     * @param string $noncestr      随机字符串
     * @param int    $timestamp     时间戳
     * @param string $url           当前网页的URL，不包含#及其后面部分
     * @param string $appid         申请应用时分配的AppKey
     * @return void
     */
    public function signature($jsapi_ticket = '', &$noncestr = '',  &$timestamp = '', &$url = '', &$appid = '')
    {
        $noncestr = $noncestr ?: Common::createNonceStr();
        $timestamp = $timestamp ?: time();
        $url = $url ?: ($_SERVER['HTTP_REFERER'] ?? '');
        $appid = $appid ?: $this->client_id;

        $params = [
            'noncestr' => $noncestr,
            'jsapi_ticket' => $jsapi_ticket,
            'timestamp' => $timestamp,
            'url' => $url,
        ];
        return Common::createSign($params, [], 'sha1');
    }
}
