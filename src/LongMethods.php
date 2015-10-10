<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 04.
 * Time: 9:46
 */

namespace Evista\CleanCode;


use Evista\CleanCode\Exception\FileNotFoundException;
use Evista\CleanCode\Exception\NotADayDateException;

class LongMethods
{
    public function getLogName($dayDate, $type){

        // Validate $d
        $datePattern = '/^20[0-9]{2}-[0,1][0-9]-[0-3][0-9]$/';
        if(! preg_match($datePattern, $dayDate)){
            throw new NotADayDateException('$d should be a day date in the format of: "Y-m-d" but instead of it you gave: '.$dayDate);
        }

        // Get some content found in a csv file
        $found = $this->getFromCSVFile(1, '34', __DIR__.'/datas-Final-2014-12-12-lastEdited.doc.csv');

        // Write a new formatted log entity to the file - eg. get from an other csv file (yesterday)
        $entity = $dayDate.": ".str_replace("'",'', $found[0])." megnyitotta böngészőjében a(z) ".$found[2]." oldalt\n\n";


        switch($type){
            case 'file':
                $filename = $dayDate.'-'.'somelog.log';
                // Create a file if not exists with that date
                if(!file_exists(__DIR__.'/../log/'.$filename)) {
                    touch(__DIR__.'/../log/'.$filename);
                    // create file
                }

                $logFile = fopen(__DIR__.'/../log/'.$filename, "a");
                fputs($logFile, $entity);
                fclose($logFile);
                break;
            case 'mail':
                $to = 'sera.balint@entity-vista.hu';
                $subject = 'LogMail ' + $dayDate;
                $body = $entity;

                mail($to, $subject, $body);

                break;
            case 'db':
                //...
                break;
            default:
                break;
        }


        // Return the new file name
        return true;
    }

    /**
     * @param $key
     * @param $value
     * @param $filePath
     * @return array Uncle Bob, levels of (abstr)actions: "to do sg, do sg else'. The second part goes to its dedicated method.
     *
     * Uncle Bob, levels of (abstr)actions: "to do sg, do sg else'. The second part goes to its dedicated method.
     * SRP - single responsibility principle
     * In this case: to get the datas from the file, read the file
     * @throws \Exception
     */
    private function getFromCSVFile($key, $value, $filePath){
        try{
            $handle = $this->openCSVFile($filePath);
        }

        catch(FileNotFoundException $exception){
            // can we go forward without a file? Return some default data
            return ["'Unknown Guy'", '0', 'unknown url'];
        }

        catch(\Exception $exception){
            // unknown: just die? why catch it? just for demonstration purposes
            throw $exception;
        }

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($data[$key] == $value){
                $found = $data;
            }
        }
        fclose($handle);

        return $found;
    }

    private function openCSVFile($filePath){
        if(!file_exists($filePath))
            throw new FileNotFoundException('File not found', null, $filePath);
        if (($handle = fopen($filePath, "r")) !== FALSE)
            return $handle;
        else
            throw new FileNotFoundException('File not found', null, $filePath);
    }
}