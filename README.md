# think-wechat

[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fhectorqin%2Fthink-wechat.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Fhectorqin%2Fthink-wechat?ref=badge_shield)

微信SDK For ThinkPHP 5.1, ThinkPHP 6.0 基于[overtrue/wechat](https://github.com/overtrue/wechat)

## 框架要求

ThinkPHP >= 5.1

## 安装

```bash
composer require hectorqin/think-wechat
```

## 配置

1. 修改配置文件
修改项目根目录下config/wechat.php中对应的参数

2. 每个模块基本都支持多账号，默认为 default。

## 使用

### 接受普通消息

```php
<?php

namespace app\index\controller;


use think\Controller;

class Wechat extends Controller
{

    public function index()
    {
        //    先初始化微信
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return 'hello,world';
        });
        $app->server->serve()->send();
    }
}
```

### 获得SDK实例

#### 使用facade

```php
use Hectorqin\ThinkWechat\Facade;

$officialAccount = Facade::officialAccount();  // 公众号
$work = Facade::work(); // 企业微信
$payment = Facade::payment(); // 微信支付
$openPlatform = Facade::openPlatform(); // 开放平台
$miniProgram = Facade::miniProgram(); // 小程序
$openWork = Facade::openWork(); // 企业微信第三方服务商
$microMerchant = Facade::microMerchant(); // 小微商户
```

以上均支持传入自定义账号:例如

```php
$officialAccount = Facade::officialAccount('test'); // 公众号
```

以上均支持传入自定义账号+配置(注:这里的config和配置文件中账号的格式相同):例如

```php
$officialAccount = Facade::officialAccount('',$config); // 公众号
```

更多 SDK 的具体使用请参考：[https://easywechat.com](https://easywechat.com)

## License

MIT

[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fhectorqin%2Fthink-wechat.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fhectorqin%2Fthink-wechat?ref=badge_large)