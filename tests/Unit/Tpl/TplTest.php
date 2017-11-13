<?php

namespace NINEJKH\Tests\Tpl;

use NINEJKH\Tpl\Tpl;
use PHPUnit\Framework\TestCase;

class TplTest extends TestCase
{
    protected static $tpl;

    public static function setUpBeforeClass()
    {
        static::$tpl = new Tpl(__DIR__ . '/../../Data');
    }

    public function testAddStyles()
    {
        static::$tpl->addStyle('http://just-a-style.com/style.css');

        $this->assertContains('http://just-a-style.com/style.css', static::$tpl->getStyles());
    }

    public function testAddScripts()
    {
        static::$tpl->addScript('http://just-a-script.com/script.js');

        $this->assertContains('http://just-a-script.com/script.js', static::$tpl->getScripts());
    }
}
