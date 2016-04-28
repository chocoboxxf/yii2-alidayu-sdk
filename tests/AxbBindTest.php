<?php
/**
 * AXB(AXN)一次绑定接口
 * User: chocoboxxf
 * Date: 16/4/22
 * Time: 下午2:59
 */

namespace chocoboxxf\Alidayu\Tests;

use Yii;

class AxbBindTest extends \PHPUnit_Framework_TestCase
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
        var_dump($alidayu->AxbBind('13000000001', '13000000000', '2017-01-01 00:00:00', true, true));
    }
}
