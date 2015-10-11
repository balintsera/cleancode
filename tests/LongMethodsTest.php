<?php

namespace Evista\CleanCode\Test;

use Evista\CleanCode\LongMethods;
use Evista\CleanCode\Value\LogParam;

class LongMethodTest extends \PHPUnit_Framework_TestCase
{
    const FILE_NAME = 'datas-Final-2014-12-12-lastEdited.doc.csv';
    const CSV_FILE_PATH = '/../src/';

    use PrivateMethod;

    /**
     * Test that true does in fact equal true
     */
    public function testGetFromCSVFile()
    {
        $logParam = new LogParam(1, '34', __DIR__.self::CSV_FILE_PATH.self::FILE_NAME);
        $this->callMethodWithParams('getFromCSVFile', $logParam);

        $expected = [
            0 => "'Kovács János'",
            1 => " 34",
            2 => " http://index.hu"
        ];

        $this->assertEquals($expected, $this->getOwnerObject()->getFound());

    }

    public function testOpenCSV(){
        $logParam = new LogParam(1, '34', __DIR__.self::CSV_FILE_PATH.self::FILE_NAME);
        $this->callMethodWithParams('openCSVFile', $logParam);

        $this->assertInternalType('resource', $this->getMethodResult());

    }

    public function testOpenCSVMissingFile(){
        $logParam = new LogParam(1, '34', self::CSV_FILE_PATH.self::FILE_NAME.'.notexists');
        $this->callMethodWithParams('getFromCSVFile', $logParam);

        $expected = [
            0 => "'Unknown Guy'",
            1 => "0",
            2 => "unknown url"
        ];

        $this->assertEquals($expected,  $this->getOwnerObject()->getFound());
    }

    public function testWriteOut(){

        // Create a temp dir if not exists
        $tmpDir = 'tmp';
        $tmpDirPath = __DIR__.'/'.$tmpDir;
        if(!file_exists($tmpDirPath)){
            mkdir($tmpDirPath);
        }

        // Delete log files from it
        $logFile = $tmpDirPath.'/'.'test-log-file-';
        $logFileWritten = $tmpDirPath.'/test-log-file-2015-10-11-somelog.log';
        if(file_exists($logFileWritten)){
            unlink($logFileWritten);
        }

        // Create an empty file and run the test with it
        $logParam = new LogParam(1, '34',  __DIR__.self::CSV_FILE_PATH.self::FILE_NAME);
        $testMessage = '#tesmessage#';
        $dayDate = '2015-10-11';
        $this->callMethodWithParams('writeOut', $logParam, ['file', $testMessage, $dayDate, $logFile]);

        // The file name will be: test-log-file.log2015-10-11-somelog.log
        // Open the file and read it's contents
        $writtenFile = fopen($logFileWritten, 'r');
        $written = fread($writtenFile, filesize($logFileWritten));
        fclose($writtenFile);

        $this->assertEquals($testMessage, $written);
    }

}
