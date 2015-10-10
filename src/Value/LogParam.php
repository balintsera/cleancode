<?php

namespace Evista\CleanCode\Value;

/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 10.
 * Time: 13:04
 */
class LogParam
{
    public $csvFilePath; //was: __DIR__.'/datas-Final-2014-12-12-lastEdited.doc.csv'
    public $needle; // was: '34'
    public $columnKey; // was: 1

    public function __construct($columnKey, $needle, $csvFilePath){
        $this->csvFilePath = $csvFilePath;
        $this->needle = $needle;
        $this->columnKey = $columnKey;
    }
}