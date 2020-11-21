<?php
//Licence: https://bit.ly/2CFA5XY
function memoize($func)
{
    return function () use ($func) {
        static $cache = [];

        $args = func_get_args();
        $key = serialize($args);
        $cached = true;

        if (!isset($cache[$key])) {
            $cache[$key] = $func(...$args);
            $cached = false;
        }

        return ['result' => $cache[$key], 'cached' => $cached];
    };
}

$memoizedAdd = memoize(
    function ($num) {
        return $num + 10;
    }
);

var_dump($memoizedAdd(5));  
var_dump($memoizedAdd(6));  
var_dump($memoizedAdd(5));  
?>
