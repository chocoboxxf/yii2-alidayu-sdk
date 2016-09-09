<?php
/**
 * 短信发送接口
 * User: chocoboxxf
 * Date: 16/9/9
 */

namespace chocoboxxf\Alidayu\Tests;

class SmsSendTest extends BaseTest
{
    public function testSend()
    {
        var_dump($this->client->smsSend('1300000000', 'SMS_100000', '测试签名', 'normal', ['code' => '111111'], '100000'));
    }
}
