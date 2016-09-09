<?php
/**
 * AXB(AXN)一次绑定接口
 * User: chocoboxxf
 * Date: 16/4/22
 * Time: 下午2:59
 */

namespace chocoboxxf\Alidayu\Tests;

class AxbBindTest extends BaseTest
{
    public function testBind()
    {
        var_dump($this->client->AxbBind('13000000001', '13000000000', '2017-01-01 00:00:00', true, true));
    }
}
