# yii2-alidayu-sdk
基于Yii2实现的阿里大鱼API SDK（目前开发中）

环境条件
--------
- >= PHP 5.4
- >= Yii 2.0
- >= GuzzleHttp 5.0

安装
----

添加下列代码在``composer.json``文件中并执行``composer update --no-dev``操作

```json
{
    "require": {
       "chocoboxxf/yii2-alidayu-sdk": "dev-master"
    }
}
```

设置方法
--------

```php
// 全局使用
// 在config/main.php配置文件中定义component配置信息
'components' => [
  .....
  'alidayu' => [
    'class' => 'chocoboxxf\Alidayu\Alidayu',
    'appKey' => '1234', // 淘宝开发平台App Key
    'appSecret' => '12345678', // 淘宝开发平台App Secret
    'partnerKey' => 'PARTNER_NAME_AXN', // 阿里大鱼提供的第三方合作伙伴使用的KEY
    'env' => 'sandbox', // 使用环境，分sandbox（测试环境）, production（生产环境）
  ]
  ....
]
// 代码中调用
$result = Yii::$app->alidayu->AxbBind('13000000001', '13000000000', '2017-01-01 00:00:00');
....
```

```php
// 局部调用
$alidayu = Yii::createObject([
    'class' => 'chocoboxxf\Alidayu\Alidayu',
    'appKey' => '1234', // 淘宝开发平台App Key
    'appSecret' => '12345678', // 淘宝开发平台App Secret
    'partnerKey' => 'PARTNER_NAME_AXN', // 阿里大鱼提供的第三方合作伙伴使用的KEY
    'env' => 'sandbox', // 使用环境，分sandbox（测试环境）, production（生产环境）
]);
$result = $alidayu->AxbBind('13000000001', '13000000000', '2017-01-01 00:00:00');
....
```

使用示例
--------

AXB(AXN)一次绑定接口

```php
$result = Yii::$app->alidayu->AxbBind('13000000001', '13000000000', '2017-01-01 00:00:00');
if (isset($result['alibaba_aliqin_secret_axb_bind_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_secret_axb_bind_response":{
    //         "subs_id":12345,
    //         "secret_no_x":"13300000000"
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":40,
    //         "msg":"Missing required arguments:phone_no_b"，
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} else {
    // 异常情况
    ....
}
....
```

AXN二次绑定接口

```php
$result = Yii::$app->alidayu->AxbBindSecond('123', '13000000000', '2017-01-01 00:00:00');
if (isset($result['alibaba_aliqin_secret_axb_bind_second_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_secret_axb_bind_second_response":{
    //         "bind_success":true
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":40,
    //         "msg":"Missing required arguments:phone_no_b"，
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} else {
    // 异常情况
    ....
}
....
```

AXB(AXN)关系解绑接口

```php
$result = Yii::$app->alidayu->AxbUnbind('123');
if (isset($result['alibaba_aliqin_secret_axb_unbind_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_secret_axb_unbind_response":{
    //         "unbind_success":true,
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":40,
    //         "msg":"Missing required arguments:subs_id"，
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} else {
    // 异常情况
    ....
}
....
```