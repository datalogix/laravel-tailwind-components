<?php

namespace Datalogix\TailwindComponents\Tests\Unit;

use Datalogix\TailwindComponents\FormDataBinder;
use PHPUnit\Framework\TestCase;

class FormDataBinderTest extends TestCase
{
    public function testCanBindTargets()
    {
        $binder = new FormDataBinder;
        $this->assertNull($binder->get());

        $binder->bind($array = ['foo' => 'bar']);
        $this->assertEquals($array, $binder->get());
    }

    public function testCanBindMultipleTargets()
    {
        $binder = new FormDataBinder;

        $binder->bind($targetA = ['foo' => 'bar']);
        $binder->bind($targetB = ['bar' => 'foo']);

        $this->assertEquals($targetB, $binder->get());
        $binder->pop();

        $this->assertEquals($targetA, $binder->get());
        $binder->pop();

        $this->assertNull($binder->get());
    }

    public function testCanBeWiredToALivewirePropertyOrNot()
    {
        $binder = new FormDataBinder;

        $this->assertFalse($binder->isWired());

        $binder->wire();
        $this->assertTrue($binder->isWired());

        $binder->endWire();
        $this->assertFalse($binder->isWired());
    }
}
