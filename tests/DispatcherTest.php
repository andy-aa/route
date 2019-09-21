<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Texlab\Route\Dispatcher;

class DispatcherTest extends TestCase
{
    protected $dis;

    protected function setUp(): void
    {
        $this->dis = new Dispatcher([
            'one/page{page}' => 'TableOne/ShowTable',
            'one' => 'TableOne/ShowTable',
            'one/add_form' => 'TableOne/ShowAddForm',
            'one/add' => 'TableOne/AddRow',
            'one/edit_form{id}' => 'TableOne/ShowEditForm',
            'one/edit_{id}' => 'TableOne/EditRow',
            'one/del_{id}' => 'TableOne/DelRow',
        ]);

    }

    function testDispatcher()
    {

        $this->assertEquals(
            ['handler' => 'TableOne/ShowTable', 'vars' => []],
            $this->dis->decodeUri('/one')
        );

        $this->assertEquals(
            ['handler' => 'TableOne/ShowTable', 'vars' => ['page' => 2]],
            $this->dis->decodeUri('/one/page2')
        );

    }


}