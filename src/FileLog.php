<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 11.
 * Time: 12:37
 */

namespace Evista\CleanCode;


class FileLog implements Writer
{
    private $message;
    private $dayDate;

    private $logDir;

    public function __construct(){
        $this->logDir =__DIR__.'/../log/';
    }

    /**
     * Write message out
     * @return mixed
     */
    public function writeOut()
    {
        $filename = $this->createFileName();
        // Create a file if not exists with that date
        if(!file_exists($this->logDir.$filename)) {
            touch($this->logDir.$filename);
            // create file
        }

        $logFile = fopen($this->logDir.$filename, "a");
        fputs($logFile, $this->message);
        fclose($logFile);
    }


    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Set dayDate
     * @param $dayDate
     * @return mixed
     */
    public function setDayDate($dayDate)
    {
        $this->dayDate = $dayDate;
    }

    public function setLogDir($logDir){
        $this->logDir = $logDir; // __DIR__.'/../log/'
    }

    public function createFileName(){
        return $this->dayDate.'-'.'somelog.log';
    }

}