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

        // Write a new formatted log e to the file - eg. get from an other csv file (yesterday)
        $e = $dayDate.": ".str_replace("'",'', $found[0])." megnyitotta böngészőjében a(z) ".$found[2]." oldalt\n\n";


        switch($type){
            case 'file':
                $filename = $dayDate.'-'.'somelog.log';
                // Create a file if not exists with that date
                if(!file_exists(__DIR__.'/../log/'.$filename)) {
                    touch(__DIR__.'/../log/'.$filename);
                    // create file
                }

                $lf = fopen(__DIR__.'/../log/'.$filename, "a");
                fputs($lf, $e);
                fclose($lf);
                break;
            case 'mail':
                $to = 'sera.balint@e-vista.hu';
                $subject = 'LogMail ' + $dayDate;
                $body = $e;

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
}