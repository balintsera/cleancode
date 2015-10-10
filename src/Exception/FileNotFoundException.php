<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 10.
 * Time: 11:51
 */

namespace Evista\CleanCode\Exception;


class FileNotFoundException extends \Exception
{
    private $filePath;


    public function __construct($message, $code, $filePath){
        $this->filePath = $filePath;

        parent::__construct($message, $code);
    }
}