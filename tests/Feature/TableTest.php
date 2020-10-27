<?php

namespace Datalogix\TailwindComponents\Tests\Feature;

use Datalogix\TailwindComponents\Tests\TestCase;

class TableTest extends TestCase
{
    public function testBasic()
    {
        $this->registerTestRoute('table.basic');

        $this->visit('/table.basic')
            ->seeElement('table')

            // thead
            ->seeElement('table>thead')
            ->seeElement('table>thead>tr')
            ->seeElementCount('table>thead>tr>th', 2)
            ->seeInElement('table>thead>tr>th', 'ID')
            ->seeInElement('table>thead>tr>th', 'Name')

            // tbody
            ->seeElement('table>tbody')
            ->seeElement('table>tbody>tr')
            ->seeElementCount('table>tbody>tr', 2)
            ->seeElementCount('table>tbody>tr>td', 4)
            ->seeInElement('table>tbody>tr>td', '1')
            ->seeInElement('table>tbody>tr>td', 'Foo')
            ->seeInElement('table>tbody>tr>td', '2')
            ->seeInElement('table>tbody>tr>td', 'Bar')

            // tfoot
            ->seeElement('table>tfoot')
            ->seeElement('table>tfoot>tr')
            ->seeElementCount('table>tfoot>tr', 1)
            ->seeElementCount('table>tfoot>tr>td', 2)
            ->seeInElement('table>tfoot>tr>td', 'Total')
            ->seeInElement('table>tfoot>tr>td', 'FooBar');
    }

    public function testWithSlots()
    {
        $this->registerTestRoute('table.slots');

        $this->visit('/table.slots')
            ->seeElement('table')

            // thead
            ->seeElement('table>thead')
            ->seeElementCount('table>thead>tr', 1)
            ->seeElementCount('table>thead>tr>th', 2)
            ->seeInElement('table>thead>tr>th', 'ID')
            ->seeInElement('table>thead>tr>th', 'Name')

            // tbody
            ->seeElement('table>tbody')
            ->seeElementCount('table>tbody>tr', 2)
            ->seeElementCount('table>tbody>tr>td', 4)
            ->seeInElement('table>tbody>tr>td', '1')
            ->seeInElement('table>tbody>tr>td', 'Foo')
            ->seeInElement('table>tbody>tr>td', '2')
            ->seeInElement('table>tbody>tr>td', 'Bar')

            // tfoot
            ->seeElement('table>tfoot')
            ->seeElementCount('table>tfoot>tr', 1)
            ->seeElementCount('table>tfoot>tr>td', 2)
            ->seeInElement('table>tfoot>tr>td', 'Total')
            ->seeInElement('table>tfoot>tr>td', 'FooBar');
    }

    public function testCellSlot()
    {
        $this->registerTestRoute('table.cell-slot');

        $this->visit('/table.cell-slot')
            ->seeElement('table')

            // thead
            ->seeElement('table>thead')
            ->seeElementCount('table>thead>tr', 1)
            ->seeElementCount('table>thead>tr>th', 3)
            ->seeInElement('table>thead>tr>th', 'ID')
            ->seeInElement('table>thead>tr>th', 'Name')
            ->seeInElement('table>thead>tr>th', 'Actions')

            // tbody
            ->seeElement('table>tbody')
            ->seeElementCount('table>tbody>tr', 2)
            ->seeElementCount('table>tbody>tr>td', 6)
            ->seeInElement('table>tbody>tr>td', '1')
            ->seeInElement('table>tbody>tr>td', 'Foo')
            ->seeInElement('table>tbody>tr>td', 'cell-slot')
            ->seeInElement('table>tbody>tr>td', '2')
            ->seeInElement('table>tbody>tr>td', 'Bar')
            ->seeInElement('table>tbody>tr>td', 'cell-slot');
    }

    public function testEmptySlot()
    {
        $this->registerTestRoute('table.empty-slot');

        $this->visit('/table.empty-slot')
            ->seeElement('table')

            // thead
            ->seeElement('table>thead')
            ->seeElementCount('table>thead>tr', 1)
            ->seeElementCount('table>thead>tr>th', 2)
            ->seeInElement('table>thead>tr>th', 'ID')
            ->seeInElement('table>thead>tr>th', 'Name')

            // tbody
            ->seeElement('table>tbody')
            ->seeElementCount('table>tbody>tr', 1)
            ->seeElementCount('table>tbody>tr>td', 1)
            ->seeInElement('table>tbody>tr>td', 'No data');
    }

    public function testEmptyText()
    {
        $this->registerTestRoute('table.empty-text');

        $this->visit('/table.empty-text')
            ->seeElement('table')

            // thead
            ->seeElement('table>thead')
            ->seeElementCount('table>thead>tr', 1)
            ->seeElementCount('table>thead>tr>th', 2)
            ->seeInElement('table>thead>tr>th', 'ID')
            ->seeInElement('table>thead>tr>th', 'Name')

            // tbody
            ->seeElement('table>tbody')
            ->seeElementCount('table>tbody>tr', 1)
            ->seeElementCount('table>tbody>tr>td', 1)
            ->seeInElement('table>tbody>tr>td', 'No records found');
    }
}
