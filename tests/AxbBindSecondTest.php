<?php
/**
 * AXB二次绑定接口测试
 * User: chocoboxxf
 * Date: 16/4/22
 * Time: 下午4:44
 */

namespace chocoboxxf\Alidayu\Tests;

class AxbBindSecondTest extends BaseTest
{
    public function testBind()
    {
        var_dump($this->client->AxbBindSecond('123', '13000000000', '2017-01-01 00:00:00', true, true));
    }
}
