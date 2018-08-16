
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_quote_email'))
{
    function get_quote_email($returnArray){
        $keys = array_keys($returnArray);
        $exp = "/email/";

        foreach ($keys as $key){
            if (preg_match($exp, $key) == 1){
                return $returnArray[$key];
            }
        }
        return false;
    }
}
