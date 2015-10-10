<?php

namespace Evista\CleanCode\Test;

use Evista\CleanCode\LongMethods;
use Evista\CleanCode\Value\LogParam;

class LongMethodTest extends \PHPUnit_Framework_TestCase
{
    const CSV_FILE_PATH = '/../src/datas-Final-2014-12-12-lastEdited.doc.csv';

    use PrivateMethod;

    /**
     * Test that true does in fact equal true
     */
    public function testGetFromCSVFile()
    {
        $logParam = new LogParam(1, '34', __DIR__.self::CSV_FILE_PATH);
        $this->callMethodWithParams('getFromCSVFile', $logParam);

        $expected = [
            0 => "'Kovács János'",
            1 => " 34",
            2 => " http://index.hu"
        ];

        $this->assertEquals($expected, $this->getOwnerObject()->getFound());

    }

    public function testOpenCSV(){
        $logParam = new LogParam(1, '34', __DIR__.self::CSV_FILE_PATH);
        $this->callMethodWithParams('openCSVFile', $logParam);

        $this->assertInternalType('resource', $this->getMethodResult());

    }

    public function testOpenCSVMissingFile(){
        $logParam = new LogParam(1, '34', self::CSV_FILE_PATH.'.notexists');
        $this->callMethodWithParams('getFromCSVFile', $logParam);

        $expected = [
            0 => "'Unknown Guy'",
            1 => "0",
            2 => "unknown url"
        ];

        $this->assertEquals($expected,  $this->getOwnerObject()->getFound());
    }

}
