<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 11.
 * Time: 12:18
 */

namespace Evista\CleanCode\Exception;


interface Writer
{
    /**
     * Write message out
     * @param $message
     * @return mixed
     */
    public function writeOut($message);
}