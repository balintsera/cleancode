<?php

namespace Evista\CleanCode\Test;

use Evista\CleanCode\LogFactory;
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
        $testMessage = "Test message";
        $dayDate = '2014-04-04';
        $logWriter = LogFactory::create(LogFactory::TYPE_FILE);
        $logWriter->setMessage($testMessage);
        $logWriter->setDayDate($dayDate);

        // Create a temp dir if not exists
        $tmpDir = 'tmp/';
        $tmpDirPath = __DIR__.'/'.$tmpDir;
        if(!file_exists($tmpDirPath)){
            mkdir($tmpDirPath);
        }

        $logWriter->setLogDir($tmpDirPath);

        // Delete log files from it
        $logFile = $tmpDirPath.'/'.$logWriter->createFileName();
        if(file_exists($logFile)){
            unlink($logFile);
        }


        $logWriter->writeOut();
        // The file name will be: test-log-file.log2015-10-11-somelog.log
        // Open the file and read it's contents
        $writtenFile = fopen($logFile, 'r');
        $written = fread($writtenFile, filesize($logFile));
        fclose($writtenFile);

        $this->assertEquals($testMessage, $written);

    }

}
