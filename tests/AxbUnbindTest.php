<?php
/**
 * AXB(AXN)关系解绑接口测试
 * User: chocoboxxf
 * Date: 16/4/26
 * Time: 上午10:49
 */

namespace chocoboxxf\Alidayu\Tests;

use Yii;

class AxbUnbindTest extends \PHPUnit_Framework_TestCase
{
    public function testBind()
    {
        $alidayu = Yii::createObject([
            'class' => 'chocoboxxf\Alidayu\Alidayu',
            'appKey' => 'APP_KEY',
            'appSecret' => 'APP_SECRET',
            'partnerKey' => 'PARTNER_NAME_AXN',
            'env' => 'sandbox',
        ]);
        var_dump($alidayu->AxbUnbind('123'));
    }
}
