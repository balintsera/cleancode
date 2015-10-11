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

    public function __construct($message);

    /**
     * Write message out
     * @return mixed
     */
    public function writeOut();
}