
微博 LittleMo
===============

[![Total Downloads](https://poser.pugx.org/littlemo/weibo/downloads)](https://packagist.org/packages/littlemo/weibo)
[![Latest Stable Version](https://poser.pugx.org/littlemo/weibo/v/stable)](https://packagist.org/packages/littlemo/weibo)
[![Latest Unstable Version](https://poser.pugx.org/littlemo/weibo/v/unstable)](https://packagist.org/packages/littlemo/weibo)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.0-8892BF.svg)](http://www.php.net/)
[![License](https://poser.pugx.org/littlemo/weibo/license)](https://packagist.org/packages/littlemo/weibo)

### 介绍
php常用工具库


### 安装教程

composer.json
```json
{
    "require": {
        "littlemo/weibo": "~1.0.0"
    }
}
```

### 使用说明

#### 获取授权过的Access Token

> OAuth2的access_token接口


##### 示例代码


```php
use littlemo\weibo\Oauth2;

$Oauth2 = new Oauth2($client_id, $client_secret);

$result = $Oauth2->access_token($code, $redirect_uri);

if ($result) {
    echo '获取Access token成功';
    $token = $Oauth2->getMessage();
} else {
    echo "获取Access token失败";
    $errorMsg = $Oauth2->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

**返回示例**
```json
 {
       "access_token": "ACCESS_TOKEN",
       "expires_in": 1234,
       "remind_in":"798114",
       "uid":"12341234"
 }
```

> [官方文档](https://open.weibo.com/wiki/Oauth2/access_token)

#### get_token_info

> 查询用户access_token的授权相关信息，包括授权时间，过期时间和scope权限。



##### 示例代码


```php
use littlemo\weibo\Oauth2;

$Oauth2 = new Oauth2();

$result = $Oauth2->get_token_info($access_token);

if ($result) {
    echo '获取token info成功';
    $token = $Oauth2->getMessage();
} else {
    echo "获取token info失败";
    $errorMsg = $Oauth2->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

**返回示例**
```json
{
      "uid": 1073880650,
      "appkey": 1352222456,
      "scope": null,
      "create_at": 1352267591,
      "expire_in": 157679471
}
```

> [官方文档](https://open.weibo.com/wiki/Oauth2/get_token_info)


#### revokeoauth2

> 授权回收接口，帮助开发者主动取消用户的授权。



##### 示例代码


```php
use littlemo\weibo\Oauth2;

$Oauth2 = new Oauth2();

$result = $Oauth2->revokeoauth2($access_token);

if ($result) {
    echo '回收成功';
    $token = $Oauth2->getMessage();
} else {
    echo "回收失败";
    $errorMsg = $Oauth2->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

**返回示例**
```json
{
 	"result":"true"
 }
```

> [官方文档](https://open.weibo.com/wiki/Oauth2/revokeoauth2)


#### show

> 根据用户ID获取用户信息



##### 示例代码


```php
use littlemo\weibo\User;

$User = new User();

$result = $User->show($access_token, $uid , $screen_name);

if ($result) {
    echo '获取用户信息成功';
    $token = $User->getMessage();
} else {
    echo "获取用户信息失败";
    $errorMsg = $User->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

> 参数uid与screen_name二者必选其一，且只能选其一；
> 接口升级后，对未授权本应用的uid，将无法获取其个人简介、认证原因、粉丝数、关注数、微博数及最近一条微博内容。

**返回示例**
```json
{
    "id": 1404376560,
    "screen_name": "zaku",
    "name": "zaku",
    "province": "11",
    "city": "5",
    "location": "北京 朝阳区",
    "description": "人生五十年，乃如梦如幻；有生斯有死，壮士复何憾。",
    "url": "http://blog.sina.com.cn/zaku",
    "profile_image_url": "http://tp1.sinaimg.cn/1404376560/50/0/1",
    "domain": "zaku",
    "gender": "m",
    "followers_count": 1204,
    "friends_count": 447,
    "statuses_count": 2908,
    "favourites_count": 0,
    "created_at": "Fri Aug 28 00:00:00 +0800 2009",
    "following": false,
    "allow_all_act_msg": false,
    "geo_enabled": true,
    "verified": false,
    "status": {
        "created_at": "Tue May 24 18:04:53 +0800 2011",
        "id": 11142488790,
        "text": "我的相机到了。",
        "source": "<a href="http://weibo.com" rel="nofollow">新浪微博</a>",
        "favorited": false,
        "truncated": false,
        "in_reply_to_status_id": "",
        "in_reply_to_user_id": "",
        "in_reply_to_screen_name": "",
        "geo": null,
        "mid": "5610221544300749636",
        "annotations": [],
        "reposts_count": 5,
        "comments_count": 8
    },
    "allow_all_comment": true,
    "avatar_large": "http://tp1.sinaimg.cn/1404376560/180/0/1",
    "verified_reason": "",
    "follow_me": false,
    "online_status": 0,
    "bi_followers_count": 215
}
```

> [官方文档](https://open.weibo.com/wiki/2/users/show)


#### domain_show

> 通过个性化域名获取用户资料以及用户最新的一条微博



##### 示例代码


```php
use littlemo\weibo\User;

$User = new User();

$result = $User->domain_show($access_token, $domain);

if ($result) {
    echo '获取用户资料成功';
    $token = $User->getMessage();
} else {
    echo "获取用户资料失败";
    $errorMsg = $User->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

> 接口升级后，对未授权本应用的uid，将无法获取其个人简介、认证原因、粉丝数、关注数、微博数及最近一条微博内容。

**返回示例**
```json
{
    "id": 1404376560,
    "screen_name": "zaku",
    "name": "zaku",
    "province": "11",
    "city": "5",
    "location": "北京 朝阳区",
    "description": "人生五十年，乃如梦如幻；有生斯有死，壮士复何憾。",
    "url": "http://blog.sina.com.cn/zaku",
    "profile_image_url": "http://tp1.sinaimg.cn/1404376560/50/0/1",
    "domain": "zaku",
    "gender": "m",
    "followers_count": 1204,
    "friends_count": 447,
    "statuses_count": 2908,
    "favourites_count": 0,
    "created_at": "Fri Aug 28 00:00:00 +0800 2009",
    "following": false,
    "allow_all_act_msg": false,
    "geo_enabled": true,
    "verified": false,
    "status": {
        "created_at": "Tue May 24 18:04:53 +0800 2011",
        "id": 11142488790,
        "text": "我的相机到了。",
        "source": "<a href="http://weibo.com" rel="nofollow">新浪微博</a>",
        "favorited": false,
        "truncated": false,
        "in_reply_to_status_id": "",
        "in_reply_to_user_id": "",
        "in_reply_to_screen_name": "",
        "geo": null,
        "mid": "5610221544300749636",
        "annotations": [],
        "reposts_count": 5,
        "comments_count": 8
    },
    "allow_all_comment": true,
    "avatar_large": "http://tp1.sinaimg.cn/1404376560/180/0/1",
    "verified_reason": "",
    "follow_me": false,
    "online_status": 0,
    "bi_followers_count": 215
}
```

> [官方文档](https://open.weibo.com/wiki/2/users/domain_show)

#### jsapi_ticket

> jsapi_ticket 是网页用于调用微博客户端内JS接口的临时票据



##### 示例代码


```php
use littlemo\weibo\JsApi;

$JsApi = new JsApi($client_id, $client_secret);

$result = $JsApi->ticket($access_token, $domain);

if ($result) {
    echo '获取 ticket 成功';
    $token = $JsApi->getMessage();
} else {
    echo "获取 ticket 失败";
    $errorMsg = $JsApi->getErrorMsg();
}

//查询完整的回调消息
$intactMsg = $Class->getIntactMsg();


```

> 其中，js_ticket 为需要获取的 jsapi_ticket ，expire_time 为过期时间。

**返回示例**
```json
{
    "result": true,
    "appkey": "",
    "js_ticket": "",
    "expire_time": 7199
}
```

> [官方文档](https://open.weibo.com/wiki/Weibo-JS_V2)

#### 签名算法

> jsapi_ticket 是网页用于调用微博客户端内JS接口的临时票据

##### 示例代码


```php
use littlemo\weibo\JsApi;

$JsApi = new JsApi($client_id);

$result = $JsApi->signature($jsapi_ticket, $noncestr,  $timestamp, $url, $client_id);


```

参数
|     参数     |  类型  | 是否必填 | 说明                                     |
| :----------: | :----: | :------: | :--------------------------------------- |
| jsapi_ticket | string |    Y     | 网页用于调用微博客户端内JS接口的临时票据 |
|   noncestr   | string |    N     | 随机字符串                               |
|  timestamp   | string |    N     | 时间戳                                   |
|     url      | string |    N     | 当前网页的URL，不包含#及其后面部分       |
|  client_id   | string |    Y     | 申请应用时分配的AppKey。                 |

> 其中，js_ticket 为需要获取的 jsapi_ticket ，expire_time 为过期时间。

**返回示例**
```string
Wm3WZYTPz0wzccnW
```

示例
```php
[
    'appkey' => $client_id,
    'timestamp' => $timestamp,
    'noncestr' => $noncestr,
    'signature' => $result,
    'url' => $url,
];
```

> [官方文档](https://open.weibo.com/wiki/Weibo-JS_V2)

### 参与贡献

1.  littlemo


### 特技

- 统一、精简
