<?php

/**
 * Class View
 */
class View
{
    /**
     * @param $result
     * @return bool
     */
    public static function show($result) {
//        require_once 'form.php';
        echo $result;
        return true;
    }

}
