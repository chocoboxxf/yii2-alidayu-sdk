<?php
/**
 * 短信发送记录查询接口
 * User: chocoboxxf
 * Date: 16/9/9
 */

namespace chocoboxxf\Alidayu\Tests;

class SmsQueryTest extends BaseTest
{
    public function testQueryList()
    {
        var_dump($this->client->smsQuery('13000000000', '20160909', 1, 50, ''));
    }

    public function testQueryOne()
    {
        var_dump($this->client->smsQuery('13000000000', '20160909', 1, 50, '100000000000^1000000000000'));
    }
}
