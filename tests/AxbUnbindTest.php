<?php
/**
 * AXB(AXN)关系解绑接口测试
 * User: chocoboxxf
 * Date: 16/4/26
 * Time: 上午10:49
 */

namespace chocoboxxf\Alidayu\Tests;

class AxbUnbindTest extends BaseTest
{
    public function testBind()
    {
        var_dump($this->client->AxbUnbind('123'));
    }
}
