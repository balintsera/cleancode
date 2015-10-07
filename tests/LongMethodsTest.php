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
        $method = $reflection->getMethod('getNameAndUrlFromCSVFile');
        $method->setAccessible(true);

        $this->assertEquals([''], $method->invokeArgs($longMethods, []));
    }
}
