<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 10.
 * Time: 13:32
 */

namespace Evista\CleanCode\Test;

use Evista\CleanCode\LongMethods;

trait PrivateMethod
{
    private $methodResult;
    private $ownerObject;

    public function callMethodWithParams($method, $logParam){
        $this->ownerObject = new LongMethods($logParam);
        $reflection = new \ReflectionClass(get_class($this->ownerObject));
        $method = $reflection->getMethod($method);
        $method->setAccessible(true);
        $this->methodResult = $method->invokeArgs($this->ownerObject, []);

    }

    /**
     * @return mixed
     */
    public function getMethodResult()
    {
        return $this->methodResult;
    }

    /**
     * @param mixed $methodResult
     * @return PrivateMethod
     */
    public function setMethodResult($methodResult)
    {
        $this->methodResult = $methodResult;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerObject()
    {
        return $this->ownerObject;
    }

    /**
     * @param mixed $ownerObject
     * @return PrivateMethod
     */
    public function setOwnerObject($ownerObject)
    {
        $this->ownerObject = $ownerObject;

        return $this;
    }



}