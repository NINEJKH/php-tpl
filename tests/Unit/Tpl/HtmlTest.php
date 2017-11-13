<?php

namespace NINEJKH\Tests\Tpl;

use NINEJKH\Tpl\Html;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    public function testEscape()
    {
        $this->assertEquals('h&amp;emp', Html::escape('h&emp', true));
    }
}
