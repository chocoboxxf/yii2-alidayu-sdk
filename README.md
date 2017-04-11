# yii2-alidayu-sdk
基于Yii2实现的阿里大鱼API SDK（目前开发中）

环境条件
--------
- >= PHP 5.4
- >= Yii 2.0
- >= GuzzleHttp 6.0

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
// 代码中调用（调用短信发送接口示例）
$result = Yii::$app->alidayu->smsSend('13000000000', 'SMS_100000', '测试签名', 'normal', ['code' => '111111'], '100000');
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
// 调用短信发送接口示例
$result = $alidayu->smsSend('13000000000', 'SMS_100000', '测试签名', 'normal', ['code' => '111111'], '100000');
....
```

使用示例
--------

短信发送接口

```php
$result = Yii::$app->alidayu->smsSend('13000000000', 'SMS_100000', '测试签名', 'normal', ['code' => '111111'], '100000');
if (isset($result['alibaba_aliqin_fc_sms_num_send_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_fc_sms_num_send_response":{
    //         "result":{
    //             "err_code":"0",
    //             "model":"100000000000^1000000000000",
    //             "success":true
    //         },
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":15,
    //         "msg":"Remote service error",
    //         "sub_code":"isv.ACCOUNT_NOT_EXISTS",
    //         "sub_msg":"阿里大于账户不存在",
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

短信发送记录查询接口

```php
$result = Yii::$app->alidayu->smsQuery('13000000000', '20160909', 1, 50, '100000000000^1000000000000');
if (isset($result['alibaba_aliqin_fc_sms_num_query_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_fc_sms_num_query_response":{
    //         "current_page":1,
    //         "page_size":50,
    //         "total_count":1,
    //         "total_page":1,
    //         "values":{
    //             "fc_partner_sms_detail_dto":[
    //                 {
    //                     "extend":"100000",
    //                     "rec_num":"13000000000",
    //                     "result_code":"DELIVRD",
    //                     "sms_code":"SMS_100000",
    //                     "sms_content":"【测试*】您的验证码是******",
    //                     "sms_receiver_time":"2016-09-09 15:27:46",
    //                     "sms_send_time":"2016-09-09 15:27:42",
    //                     "sms_status":3
    //                 }
    //             ]
    //         }
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":15,
    //         "msg":"Remote service error",
    //         "sub_code":"isv.ACCOUNT_NOT_EXISTS",
    //         "sub_msg":"阿里大于账户不存在",
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

文本转语音通知接口

```php
$result = Yii::$app->alidayu->ttsSingleCall('13000000000', 'TTS_14730399', '051482043260', ['code' => '111111'], '100000'));
if (isset($result['alibaba_aliqin_fc_tts_num_singlecall_response'])) {
    // 正常情况
    // 返回数据格式
    // {
    //     "alibaba_aliqin_fc_tts_num_singlecall_response":{
    //         "result":{
    //             "err_code":"0",
    //             "model":"100000000000^1000000000000",
    //             "success":true
    //         },
    //         "request_id":"zt9pqaglr3tk"
    //     }
    // }
    ....
} elseif (isset($result['error_response'])) {
    // 出错情况
    // 返回数据格式
    // {
    //     "error_response":{
    //         "code":15,
    //         "msg":"Remote service error",
    //         "sub_code":"isv.TTS_TEMPLATE_ILLEGAL",
    //         "sub_msg":"未找到审核通过的文本转语音模板,ttsCode=TTS_100000,partnerId=10000000000",
    //         "request_id":"zt9pqaglr3tk"
    // }
    ....
} else {
    // 异常情况
    ....
}
....
```

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
    //         "msg":"Missing required arguments:phone_no_b",
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
    //         "msg":"Missing required arguments:phone_no_b",
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
    //         "msg":"Missing required arguments:subs_id",
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