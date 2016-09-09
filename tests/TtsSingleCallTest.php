<?php
/**
 * 文本转语音通知接口
 * User: chocoboxxf
 * Date: 16/9/9
 */

namespace chocoboxxf\Alidayu\Tests;

class TtsSingleCallTest extends BaseTest
{
    public function testCall()
    {
        var_dump($this->client->ttsSingleCall('13000000000', 'TTS_10000', '02100000000', ['code' => ',1,2,3,4,5,6'], '100000'));
    }
}
