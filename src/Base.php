<?php

// +----------------------------------------------------------------------
// | Little Mo - Tool [ WE CAN DO IT JUST TIDY UP IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2021 http://ggui.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: littlemo <25362583@qq.com>
// +----------------------------------------------------------------------

namespace littlemo\weibo;

use littlemo\utis\HttpClient;



/**
 * Aip Base 基类
 * 
 * @ApiInternal
 */
class Base
{


    /**
     * 申请应用时分配的AppKey。
     *
     * @var string
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-02
     * @version 2021-11-02
     */
    protected $client_id = null;

    /**
     * 	申请应用时分配的AppSecret。
     *
     * @var string
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-02
     * @version 2021-11-02
     */
    protected $client_secret = null;

    /**
     * 成功消息
     *
     * @var [type]
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     */
    protected static $message = null;

    /**
     * 错误消息
     *
     * @var [type]
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     */
    protected static $error_msg = null;

    /**
     * 完整的消息
     *
     * @var array
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     */
    protected static $intact_msg = [];

    /**
     * 构造函数
     * @param $client_id    string 申请应用时分配的AppKey。
     * @param $client_secret   string 申请应用时分配的AppSecret。
     */
    public function __construct($client_id = '', $client_secret = '')
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    /**
     * 整理接口返回结果
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     * @param [type] $result
     * @return void
     */
    protected function init_result($result, $error_field = 'error_code', $error_code = 0)
    {
        static::$intact_msg[] = $result;

        $content = $result['content'];
        $content =  !empty($content) ? json_decode($content, true) : $content;
        $error_des = $result['error_des'];

        if ($result['code'] === 0 || $content === false) {
            static::$error_msg = $error_des;
            return false;
        } else {
            if ($content[$error_field] !== $error_code) {
                static::$error_msg = $error_des ?: $content;
                return false;
            }
            static::$message = $content;
            return true;
        }
    }

    /**
     * 返回成功消息
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     * @return void
     */
    public function getMessage()
    {
        return self::$message;
    }

    /**
     * 返回失败消息
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     * @return void
     */
    public function getErrorMsg()
    {
        return self::$error_msg;
    }

    /**
     * 返回完整的消息
     *
     * @description
     * @example
     * @author LittleMo 25362583@qq.com
     * @since 2021-11-12
     * @version 2021-11-12
     * @return void
     */
    public function getIntactMsg()
    {
        return self::$intact_msg;
    }
}
