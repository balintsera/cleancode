<?php

namespace League\Skeleton\Test;

use Evista\CleanCode\LongMethods;

class LongMethodTest extends \PHPUnit_Framework_TestCase
{
    const CSV_FILE_PATH = '/../src/datas-Final-2014-12-12-lastEdited.doc.csv';


    /**
     * Test that true does in fact equal true
     */
    public function testGetFromCSVFile()
    {
        $longMethods = new LongMethods(1, '34', __DIR__.self::CSV_FILE_PATH);
        $reflection = new \ReflectionClass(get_class($longMethods));
        $method = $reflection->getMethod('getFromCSVFile');
        $method->setAccessible(true);

        $expected = [
            0 => "'Kovács János'",
            1 => " 34",
            2 => " http://index.hu"
        ];

        $this->assertEquals($expected, $method->invokeArgs($longMethods, []));

    }

    public function testOpenCSV(){
        $longMethods = new LongMethods(1, '34', __DIR__.self::CSV_FILE_PATH);
        $reflection = new \ReflectionClass(get_class($longMethods));
        $method = $reflection->getMethod('openCSVFile');
        $method->setAccessible(true);

        $this->assertInternalType('resource', $method->invokeArgs($longMethods, []));

    }

    public function testOpenCSVMissingFile(){
        $longMethods = new LongMethods(1, '34', self::CSV_FILE_PATH.'.notexists');
        $reflection = new \ReflectionClass(get_class($longMethods));
        $method = $reflection->getMethod('getFromCSVFile');
        $method->setAccessible(true);

        $expected = [
            0 => "'Unknown Guy'",
            1 => "0",
            2 => "unknown url"
        ];

        $this->assertEquals($expected, $method->invokeArgs($longMethods, []));
    }

}
