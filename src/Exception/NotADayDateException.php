<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 07.
 * Time: 17:36
 */

namespace Evista\CleanCode\Exception;


class NotADayDateException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null) {

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

}