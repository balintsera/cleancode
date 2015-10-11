<?php
/**
 * Created by PhpStorm.
 * User: balint
 * Date: 2015. 10. 11.
 * Time: 13:27
 */

namespace Evista\CleanCode;

use Evista\CleanCode\Exception\WrongLogFactoryTypeException;

final class LogFactory
{
    const TYPE_FILE = 'file';
    const TYPE_MAIL = 'mail';


    public static function create($type){
        switch($type){
            case self::TYPE_FILE:
                $object = new FileLog();
            break;
            case self::TYPE_MAIL:
                $object = new MailLog();
            break;

            default:
                throw new WrongLogFactoryTypeException('Wrong $type parameter: '.$type);

        }

        return $object;
    }
}