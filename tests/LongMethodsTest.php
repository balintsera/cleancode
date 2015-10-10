<?php

namespace League\Skeleton\Test;

use Evista\CleanCode\LongMethods;

class LongMethodTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test that true does in fact equal true
     */
    public function testPrivateFunction()
    {
        $longMethods = new LongMethods();
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


}
