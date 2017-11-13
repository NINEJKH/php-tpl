<?php

namespace NINEJKH\Tests\Tpl;

use NINEJKH\Tpl\Tpl;
use PHPUnit\Framework\TestCase;

class TplTest extends TestCase
{
    protected $tpl;

    public function __construct()
    {
        $this->tpl = new Tpl(realpath(__DIR__ . '/../../Data/'));
    }

    public function testAddStyles()
    {
        $this->tpl->addStyle('http://just-a-style.com/style.css');

        $this->assertContains('http://just-a-style.com/style.css', $this->tpl->getStyles());
    }

    public function testAddScripts()
    {
        $this->tpl->addScript('http://just-a-script.com/script.js');

        $this->assertContains('http://just-a-script.com/script.js', $this->tpl->getScripts());
    }
}
