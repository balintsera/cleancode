<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 04.
 * Time: 9:46
 */

namespace Evista\CleanCode\Methods;


class LongMethods
{
    public function getLogName($day){

        // Validate some parameters: a date
        if(isset($day)){
            return false;
        }

        $datePattern = '/^20[0-9]{2}-[0,1][0-9]-[0-3][0-9]\s$/';
        if(preg_match($datePattern, $day)){
            $filename = $datePattern.'-'.'somelog.log';
            // Create a file if not exists with that date
            if(!file_exists('../logs/'.$filename)) {

                // Generate some content found in a csv file
                $row = 1;
                if (($handle = fopen('datas-Final-2014-12-12-lastEdited.doc.csv', "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        echo "<p> $num fields in line $row: <br /></p>\n";
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                            echo $data[$c] . "<br />\n";
                        }
                    }
                    fclose($handle);
                }

                if(file_exists('datas-Final-2014-12-12-lastEdited.doc.csv')){

                }



                // Write a new formatted log entry to the file - eg. get from an other csv file (yesterday)

                // Return the new file name?
            }
        }

    }
}