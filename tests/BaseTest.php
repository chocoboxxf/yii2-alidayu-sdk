<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 16/9/9
 */

namespace chocoboxxf\Alidayu\Tests;

use Yii;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \chocoboxxf\Alidayu\Alidayu
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = Yii::createObject([
            'class' => 'chocoboxxf\Alidayu\Alidayu',
            'appKey' => isset($_ENV['APP_KEY']) ? $_ENV['APP_KEY'] : 'APP_KEY',
            'appSecret' => isset($_ENV['APP_SECRET']) ? $_ENV['APP_SECRET'] : 'APP_SECRET',
            'partnerKey' => isset($_ENV['PARTNER_KEY']) ? $_ENV['PARTNER_KEY'] : 'PARTNER_KEY',
            'env' => isset($_ENV['APP_ENV']) ? $_ENV['APP_ENV'] : 'sandbox',
        ]);
    }
}
