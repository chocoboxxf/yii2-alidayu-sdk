<?php
/**
 * AXB二次绑定接口测试
 * User: chocoboxxf
 * Date: 16/4/22
 * Time: 下午4:44
 */

namespace chocoboxxf\Alidayu\Tests;

use Yii;

class AxbBindSecondTest extends \PHPUnit_Framework_TestCase
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
        var_dump($alidayu->AxbBindSecond('123', '13000000000', '2017-01-01 00:00:00', true, true));
    }
}
