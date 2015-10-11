<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 11.
 * Time: 12:37
 */

namespace Evista\CleanCode\Exception;


class LogFile implements Writer
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Write message out
     * @return mixed
     */
    public function writeOut()
    {
        // TODO: Implement writeOut() method.
    }

}