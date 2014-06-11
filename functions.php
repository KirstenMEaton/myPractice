<?php
    function is_administrator($name = 'Sade', $value = 'Adu') {
        if (isset($_COOKIE[$name]) && ($_COOKIE[$name] ==$value)) {
            return true;
        }else{
            return false;       
    }
    } //End of is_administrator function
    ?>