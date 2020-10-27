<?php

namespace Datalogix\TailwindComponents\Tests\Unit;

use Datalogix\TailwindComponents\ThemeBinder;
use PHPUnit\Framework\TestCase;

class ThemeBinderTest extends TestCase
{
    public function testCanBindThemes()
    {
        $binder = new ThemeBinder;
        $this->assertNull($binder->get());

        $binder->bind($array = ['foo' => 'bar']);
        $this->assertEquals($array, $binder->get());
    }

    public function testCanBindMultipleThemes()
    {
        $binder = new ThemeBinder;

        $binder->bind($targetA = ['foo' => 'bar']);
        $binder->bind($targetB = ['bar' => 'foo']);

        $this->assertEquals($targetB, $binder->get());
        $binder->pop();

        $this->assertEquals($targetA, $binder->get());
        $binder->pop();

        $this->assertNull($binder->get());
    }
}
