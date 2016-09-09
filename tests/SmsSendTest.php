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
        var_dump($this->client->smsSend('13402149607', 'SMS_13450746', '测试1', 'normal', ['code' => '111233'], '100022'));
    }
}
