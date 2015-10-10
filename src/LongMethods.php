<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 04.
 * Time: 9:46
 */

namespace Evista\CleanCode;


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
        $found = $this->getFromCSVFile(1, '34');

        dump($found);
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


    private function getFromCSVFile($key, $value){
        if (($handle = fopen(__DIR__.'/datas-Final-2014-12-12-lastEdited.doc.csv', "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($data[$key] == $value){
                    $found = $data;
                }
            }
            fclose($handle);
        }
        return $found;
    }
}