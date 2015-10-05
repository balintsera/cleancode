<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 04.
 * Time: 9:46
 */

namespace Evista\CleanCode;


class LongMethods
{
    public function getLogName($day){

        // Validate some parameters: a date
        if(!isset($day)){
            return false;
        }
        $datePattern = '/^20[0-9]{2}-[0,1][0-9]-[0-3][0-9]$/';
        if(preg_match($datePattern, $day)){
            $filename = $day.'-'.'somelog.log';
            // Create a file if not exists with that date
            if(!file_exists(__DIR__.'/../log/'.$filename)) {
                touch(__DIR__.'/../log/'.$filename);
                // create file
            }

            $logfile = fopen(__DIR__.'/../log/'.$filename, "a");


            // Get some content found in a csv file
            $row = 1;

            if (($handle = fopen(__DIR__.'/datas-Final-2014-12-12-lastEdited.doc.csv', "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $row++;
                    if($data[1] == '34'){
                        $found = $data;
                    }
                }
                fclose($handle);
            }

            // Write a new formatted log entry to the file - eg. get from an other csv file (yesterday)
            $entry = $day.": ".str_replace("'",'', $found[0])." megnyitotta böngészőjében a(z) ".$found[2]." oldalt\n\n";

            fputs($logfile, $entry);
            fclose($logfile);
            // Return the new file name?
            return $logfile;
        }

    }
}