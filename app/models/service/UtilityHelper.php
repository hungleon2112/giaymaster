<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 4/7/14
 * Time: 4:53 PM
 */

use Curl\Curl;
use Carbon\Carbon;
class UtilityHelper extends BaseService
{

    public static function test($value)
    {
        echo '<pre>';
        print_r($value);
        die('-->testing');
    }

}
