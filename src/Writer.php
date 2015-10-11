<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 11.
 * Time: 12:18
 */

namespace Evista\CleanCode;


interface Writer
{
    /**
     * Set message
     * @param $message
     * @return mixed
     */
    public function setMessage($message);

    /**
     * Set dayDate
     * @param $dayDate
     * @return mixed
     */
    public function setDayDate($dayDate);
    /**
     * Write message out
     * @return mixed
     */
    public function writeOut();
}