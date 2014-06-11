<?php
    // This function checks if the user is an administrator.
    // This function takes to optional values.
    // This function returns a Boolean value
    function is_administrator($name = 'Sade', $value = 'Adu') {
        if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
            return true;
        }else{
            return false;       
    }
    } //End of is_administrator function
    ?>